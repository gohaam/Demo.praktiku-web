<?php
namespace app\Routes;
include(__DIR__."/../Controller/ProductController.php");
use app\Controller\ProductController;

class ProductRoutes {
    private $controller;

    public function __construct() {
        $this->controller = new ProductController();
    }

    public function handle($method, $path) {
        

        if ($method == "GET" && $path == "/app/api/product") {
            // Menangani GET untuk semua produk
            $response = $this->controller->index();
            echo $response;
        } elseif ($method == "GET" && strpos($path, "/app/api/product") === 0) {
            // Menangani GET untuk produk berdasarkan ID
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            $response = $this->controller->getById($id);
            echo $response;
        } elseif ($method == "POST" && $path == "/app/api/product") {
            // Menangani POST untuk menambah produk
            $response = $this->controller->insert($_POST);
            echo $response;
        } elseif ($method == "PUT" && strpos($path, "/app/api/product") === 0) {
            // Menangani PUT untuk memperbarui produk berdasarkan ID
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            parse_str(file_get_contents("php://input"), $_PUT);
            $response = $this->controller->update($id, $_PUT);
            echo $response;
        } elseif ($method == "DELETE" && strpos($path, "/app/api/product") === 0) {
            // Menangani DELETE untuk menghapus produk berdasarkan ID
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            $response = $this->controller->delete($id);
            echo $response;
        } else {
            // Jika metode tidak dikenali, kembalikan 405 Method Not Allowed
            echo $this->controller->apiResponse(405, "Method Not Allowed");
        }
        
    }
}
