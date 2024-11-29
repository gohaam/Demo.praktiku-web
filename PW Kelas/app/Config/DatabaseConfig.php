<?php
namespace app\Config;

class DatabaseConfig {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database_name = "tokoroti";
    private $port = 3306;

    public function connect() {
        // Tambahkan debugging untuk memeriksa apakah mysqli tersedia
        if (!class_exists('mysqli')) {
            die("mysqli extension is not available.");
        }

        $conn = new \mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
