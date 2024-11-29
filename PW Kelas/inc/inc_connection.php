<?php
// Konfigurasi database
$host = "localhost"; // Host database
$username = "root"; // Username database (sesuaikan jika berbeda)
$password = ""; // Password database (kosong jika tidak ada)
$database = "tokoroti"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 
?>
