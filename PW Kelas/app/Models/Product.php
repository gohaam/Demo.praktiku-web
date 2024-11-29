<?php
namespace app\Models;

include (__DIR__."/../Config/DatabaseConfig.php");
use app\Config\DatabaseConfig;

class Product {
    private $conn;

    public function __construct() {
        $this->conn = (new DatabaseConfig())->connect();
    }

    public function findAll() {
        $query = "SELECT * FROM product";
        $result = $this->conn->query($query);
        
        if ($result === false) {
            return [];  // Kembalikan array kosong jika query gagal
        }

        $products = $result->fetch_all(MYSQLI_ASSOC);
        $result->free(); // Bebaskan hasil untuk menghemat resource
        return $products;
    }

    public function findById($id) {
        $query = "SELECT * FROM product WHERE id_roti = ?";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
    
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
    
        $result = $stmt->get_result();
        if ($result === false) {
            die("Error fetching result: " . $stmt->error);
        }

        $data = $result->fetch_assoc();
        $stmt->close(); // Tutup statement setelah eksekusi
        return $data ?? null;
    }

    public function create($data) {
        $query = "INSERT INTO product (nama, harga, img_path) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }
    
        // Jika ada data yang kosong, berikan nilai `NULL` agar sesuai dengan struktur tabel
        $name = $data['nama'] ?? null;
        $price = is_numeric($data['harga']) ? (float) $data['harga'] : null;
        $image = $data['img_path'] ?? null; 
    
        // Bind parameters (gunakan "s" untuk nilai string atau NULL)
        $stmt->bind_param("sds", $name, $price, $image);

        
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
    
        $stmt->close();
        return $this->conn->insert_id; // Kembalikan ID dari data yang baru dibuat
    }
    
    public function update($id, $data) {
        $query = "UPDATE product SET nama = ?, harga = ?, img_path = ? WHERE id_roti = ?";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }
    
        // Jika ada data yang kosong, berikan nilai `NULL`
        $name = $data['nama'] ?? null;
        $price = is_numeric($data['harga']) ? (float) $data['harga'] : null;

        $image = $data['img_path'] ?? null;
    
        // Bind parameters
        $stmt->bind_param("sdsi", $name, $price, $image, $id);
    
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
    
        $stmt->close();
        return true;
    }
    

    public function delete($id) {
        $query = "DELETE FROM product WHERE id_roti = ?";
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }

        $stmt->close(); // Tutup statement setelah eksekusi
        return true;
    }
}
