<?php
// migration.php
require_once 'koneksi.php';

echo "Menjalankan migration...<br>";

// Matikan foreign key checks
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

// Hapus tabel lama
mysqli_query($conn, "DROP TABLE IF EXISTS users");
mysqli_query($conn, "DROP TABLE IF EXISTS servers");
mysqli_query($conn, "DROP TABLE IF EXISTS orders");
mysqli_query($conn, "DROP TABLE IF EXISTS migrations");
echo "✅ Tabel lama dihapus.<br>";

// Buat tabel orders (VERSI FINAL)
$sql_orders = "CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    server_id VARCHAR(50) NOT NULL,
    game VARCHAR(100) NOT NULL,
    nickname VARCHAR(100) NOT NULL,
    diamond INT NOT NULL,
    payment VARCHAR(50) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    wa VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

mysqli_query($conn, $sql_orders);
echo "✅ Tabel orders created.<br>";

// Buat tabel migrations
$sql_migrations = "CREATE TABLE migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration_name VARCHAR(255) NOT NULL,
    run_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql_migrations);
echo "✅ Tabel migrations created.<br>";

// Catat migration
$sql_log = "INSERT INTO migrations (migration_name) VALUES 
    ('fix_orders_table_final')";
mysqli_query($conn, $sql_log);
echo "✅ Migration logged.<br>";

// Hidupkan foreign key checks
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

echo "<br>🎉 SEMUA MIGRATION SELESAI!";
echo "<br>📌 user_id = ID Game ML (bebas angka)";
echo "<br>📌 server_id = Server ML (bebas angka)";
?>