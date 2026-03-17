<?php
// migration.php
require_once 'koneksi.php';

echo "Menjalankan migration...<br>";

// Matikan foreign key checks
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

// Hapus tabel lama kalau ada
mysqli_query($conn, "DROP TABLE IF EXISTS users");
mysqli_query($conn, "DROP TABLE IF EXISTS orders");
mysqli_query($conn, "DROP TABLE IF EXISTS migrations");
mysqli_query($conn, "DROP TABLE IF EXISTS servers");
echo "✅ Tabel lama dihapus.<br>";

// 1. Buat tabel users (UNTUK LOGIN)
$sql_users = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    wa VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

if(mysqli_query($conn, $sql_users)) {
    echo "✅ Tabel users created.<br>";
} else {
    echo "❌ Gagal buat tabel users: " . mysqli_error($conn) . "<br>";
}

// 2. Buat tabel orders (VERSI FINAL DENGAN STATUS)
$sql_orders = "CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT 0,
    server_id VARCHAR(50) NOT NULL,
    game VARCHAR(100) NOT NULL,
    nickname VARCHAR(100) NOT NULL,
    diamond INT NOT NULL,
    payment VARCHAR(50) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    wa VARCHAR(20) NOT NULL,
    status ENUM('Pending', 'Success', 'Failed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

if(mysqli_query($conn, $sql_orders)) {
    echo "✅ Tabel orders created (dengan status).<br>";
} else {
    echo "❌ Gagal buat tabel orders: " . mysqli_error($conn) . "<br>";
}

// 3. Buat tabel migrations
$sql_migrations = "CREATE TABLE migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration_name VARCHAR(255) NOT NULL,
    run_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if(mysqli_query($conn, $sql_migrations)) {
    echo "✅ Tabel migrations created.<br>";
} else {
    echo "❌ Gagal buat tabel migrations: " . mysqli_error($conn) . "<br>";
}

// 4. Insert data dummy user (biar bisa login)
$hashed_password_admin = password_hash('admin123', PASSWORD_DEFAULT);
$hashed_password_user = password_hash('user123', PASSWORD_DEFAULT);

$sql_dummy_users = "INSERT INTO users (username, email, wa, password, role) VALUES
    ('admin', 'admin@fury.com', '08123456789', '$hashed_password_admin', 'admin'),
    ('testuser', 'test@fury.com', '08123456788', '$hashed_password_user', 'user')
    ON DUPLICATE KEY UPDATE id=id";

if(mysqli_query($conn, $sql_dummy_users)) {
    echo "✅ Data dummy users inserted.<br>";
    echo "   📧 admin@fury.com / admin123<br>";
    echo "   📧 test@fury.com / user123<br>";
} else {
    echo "❌ Gagal insert dummy users: " . mysqli_error($conn) . "<br>";
}

// 5. Catat migration
$sql_log = "INSERT INTO migrations (migration_name) VALUES 
    ('create_users_table'),
    ('create_orders_table_final'),
    ('add_status_column')";

if(mysqli_query($conn, $sql_log)) {
    echo "✅ Migration logged.<br>";
} else {
    echo "❌ Gagal log migration: " . mysqli_error($conn) . "<br>";
}

// Hidupkan lagi foreign key checks
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

echo "<br>🎉 SEMUA MIGRATION SELESAI!";
echo "<br>📌 Silakan login dengan:";
echo "<br>   - Admin: admin@fury.com / admin123";
echo "<br>   - User: test@fury.com / user123";
?>