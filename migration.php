<?php
// migration.php
require_once 'koneksi.php';

echo "Menjalankan migration...<br>";

// Matikan foreign key checks dulu
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

// 1. Buat tabel users
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql_users);
echo "✅ Tabel users created.<br>";

// 2. Buat tabel servers
$sql_servers = "CREATE TABLE IF NOT EXISTS servers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    server_name VARCHAR(100) NOT NULL,
    server_ip VARCHAR(50),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql_servers);
echo "✅ Tabel servers created.<br>";

// 3. Buat tabel orders (dengan kolom game)
$sql_orders = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    server_id INT NOT NULL,
    game VARCHAR(100) NOT NULL,
    nickname VARCHAR(100) NOT NULL,
    diamond INT NOT NULL,
    payment VARCHAR(50) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    wa VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (server_id) REFERENCES servers(id) ON DELETE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
mysqli_query($conn, $sql_orders);
echo "✅ Tabel orders created.<br>";

// 4. Buat tabel migrations
$sql_migrations = "CREATE TABLE IF NOT EXISTS migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration_name VARCHAR(255) NOT NULL,
    run_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql_migrations);
echo "✅ Tabel migrations created.<br>";

// 5. Insert data dummy users
$sql_users_data = "INSERT INTO users (username, email, password) VALUES
    ('john_doe', 'john@example.com', MD5('password123')),
    ('jane_smith', 'jane@example.com', MD5('password123')),
    ('budi', 'budi@example.com', MD5('password123'))
    ON DUPLICATE KEY UPDATE id=id";
mysqli_query($conn, $sql_users_data);
echo "✅ Data users inserted.<br>";

// 6. Insert data dummy servers
$sql_servers_data = "INSERT INTO servers (server_name, server_ip, status) VALUES
    ('Server A - Jakarta', '192.168.1.10', 'active'),
    ('Server B - Surabaya', '192.168.1.11', 'active'),
    ('Server C - Bandung', '192.168.1.12', 'inactive')
    ON DUPLICATE KEY UPDATE id=id";
mysqli_query($conn, $sql_servers_data);
echo "✅ Data servers inserted.<br>";

// 7. Insert data dummy orders
$sql_orders_data = "INSERT INTO orders (user_id, server_id, game, nickname, diamond, payment, total, wa) VALUES
    (1, 1, 'Mobile Legends', 'JohnGamer', 500, 'DANA', 100000, '081234567890'),
    (1, 2, 'Free Fire', 'JohnFF', 1000, 'OVO', 200000, '081234567890'),
    (2, 1, 'PUBG Mobile', 'JanePUBG', 600, 'GoPay', 150000, '081298765432'),
    (2, 3, 'Mobile Legends', 'JaneML', 300, 'DANA', 60000, '081298765432'),
    (3, 2, 'Free Fire', 'BudiFF', 1000, 'Bank Transfer', 200000, '081234598765')
    ON DUPLICATE KEY UPDATE id=id";
mysqli_query($conn, $sql_orders_data);
echo "✅ Data orders inserted.<br>";

// 8. Catat migration
$sql_log = "INSERT INTO migrations (migration_name) VALUES 
    ('create_all_tables'),
    ('add_game_to_orders')";
mysqli_query($conn, $sql_log);
echo "✅ Migration logged.<br>";

// Hidupkan lagi foreign key checks
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

echo "<br>🎉 SEMUA MIGRATION SELESAI! Database siap digunakan.";
?>