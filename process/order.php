<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../koneksi.php";

// Ambil user_id dari session (yang login)
$user_id = $_SESSION['user_id'] ?? 0;

// Kalau tidak login, redirect atau kasih error
if ($user_id == 0) {
    die("Silakan login terlebih dahulu!");
}

// PASTIKAN KONEKSI PAKAI UTF8MB4
mysqli_set_charset($conn, "utf8mb4");
mysqli_query($conn, "SET NAMES utf8mb4 COLLATE utf8mb4_general_ci");

// Cek method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak sah!");
}

// Ambil semua data
$server_id = $_POST['server_id'] ?? 0;
$game = $_POST['game'] ?? '';
$nickname = $_POST['nickname'] ?? '';
$diamond = $_POST['diamond'] ?? 0;
$payment = $_POST['payment'] ?? '';
$total = $_POST['total'] ?? 0;
$wa = $_POST['wa'] ?? '';

// Validasi
if (empty($game) || empty($nickname) || empty($diamond) || empty($payment) || empty($wa)) {
    die("Data tidak lengkap!");
}

// Pakai prepared statement
$sql = "INSERT INTO orders (user_id, server_id, game, nickname, diamond, payment, total, wa) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iississs", 
    $user_id, $server_id, $game, $nickname, $diamond, $payment, $total, $wa
);

if(mysqli_stmt_execute($stmt)){
    // ====== INI YANG DITAMBAH! ======
    $order_id = mysqli_insert_id($conn);  // Ambil ID order terbaru
    echo "success|" . $order_id;          // Kirim success|ID
    // ====== SAMPAI SINI ======
} else {
    echo "error|" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>