<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "project_one"; // ganti sesuai nama database kamu

$conn = new mysqli($host, $user, $pass, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// 1️⃣ Buat tabel migrations kalau belum ada
$conn->query("
CREATE TABLE IF NOT EXISTS migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration_name VARCHAR(255) NOT NULL,
    run_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
");

// 2️⃣ Migration: tambah kolom 'game' di orders
$migrationName = "add_game_to_orders";

// Cek apakah migration sudah dijalankan
$check = $conn->query("SELECT * FROM migrations WHERE migration_name='$migrationName'");
if($check->num_rows == 0){

    // Cek kolom dulu
    $colCheck = $conn->query("SHOW COLUMNS FROM orders LIKE 'game'");
    if($colCheck->num_rows == 0){
        $conn->query("ALTER TABLE orders ADD COLUMN game VARCHAR(50) NULL AFTER server_id");
        echo "Kolom 'game' ditambahkan ke orders.<br>";
    }

    // Catat migration sudah dijalankan
    $conn->query("INSERT INTO migrations (migration_name) VALUES ('$migrationName')");
    echo "Migration $migrationName selesai.<br>";
}else{
    echo "Migration $migrationName sudah pernah dijalankan.<br>";
}

// 3️⃣ Update data lama NULL jadi default game
$gameDefault = 'Mobile Legends';
$checkData = $conn->query("SELECT * FROM orders WHERE game IS NULL LIMIT 1");
if($checkData->num_rows > 0){
    $conn->query("UPDATE orders SET game='$gameDefault' WHERE game IS NULL");
    echo "Data lama yang NULL diupdate dengan game '$gameDefault'.<br>";
}
?>