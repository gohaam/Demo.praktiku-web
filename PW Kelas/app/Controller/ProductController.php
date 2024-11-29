<?php
namespace app\Controller;

include (__DIR__."/../Traits/ApiResponseFormatter.php");
include (__DIR__."/../Models/Product.php");
use app\Traits\ApiResponseFormatter;
use app\Models\Product;

class ProductController {
    use ApiResponseFormatter;

    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        // Asumsikan $this->productModel adalah instance dari model Product yang mengakses database
        $products = $this->productModel->findAll();
    
        // Pastikan $products memiliki nilai yang valid
        if ($products === false) {
            // Jika query gagal, kembalikan pesan error
            return json_encode([
                "status" => "error",
                "message" => "Failed to retrieve products."
            ]);
        }
    
        // Mengembalikan data produk dalam format JSON
        return json_encode([
            "status" => "success",
            "data" => $products
        ]);
    }
    

    public function getById($id) {
        $data = $this->productModel->findById($id);
        return $this->apiResponse(200, "success", $data);
    }

    public function insert() {
        // Ambil data dari request body
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true); // Mengubah JSON menjadi array
    
        // Cek apakah `json_decode` berhasil
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->apiResponse(400, "Invalid JSON format", []);
        }
    
        // Debug: Pastikan data tidak kosong
        var_dump($data);
    
        // Kirim data ke model `create`
        $result = $this->productModel->create($data);
    
        if (!$result) {
            return $this->apiResponse(500, "Failed to create product");
        }
    
        // Ambil data baru yang dimasukkan untuk respon
        $newData = $this->productModel->findById($result);
        return $this->apiResponse(201, "Product created successfully", $newData);
    }
    

    public function update($id) {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->apiResponse(400, "Invalid JSON format", []);
        }
    
        $result = $this->productModel->update($id, $data);
    
        if (!$result) {
            return $this->apiResponse(500, "Failed to update product");
        }
    
        // Mengambil data terbaru dari database untuk memastikan update berhasil
        $updatedData = $this->productModel->findById($id);
        return $this->apiResponse(200, "Product updated successfully", $updatedData);
    }

    public function delete($id) {
        $this->productModel->delete($id);
        return $this->apiResponse(200, "Product deleted", []);
    }
}
