<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../koneksi.php";

// PASTIKAN KONEKSI PAKAI UTF8MB4
mysqli_set_charset($conn, "utf8mb4");
mysqli_query($conn, "SET NAMES utf8mb4 COLLATE utf8mb4_general_ci");

// ... sisa kode tetap

// Cek method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak sah!");
}

// Ambil semua data
$user_id = $_POST['user_id'] ?? 0;
$server_id = $_POST['server_id'] ?? 0;
$game = $_POST['game'] ?? '';
$nickname = $_POST['nickname'] ?? '';
$diamond = $_POST['diamond'] ?? 0;
$payment = $_POST['payment'] ?? '';
$total = $_POST['total'] ?? 0;
$wa = $_POST['wa'] ?? '';

// Validasi
if (empty($game) || empty($nickname) || empty($diamond) || empty($payment) || empty($wa)) {
    die("Data tidak lengkap! " . json_encode($_POST));
}

// Pakai prepared statement
$sql = "INSERT INTO orders (user_id, server_id, game, nickname, diamond, payment, total, wa) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iississs", 
    $user_id, $server_id, $game, $nickname, $diamond, $payment, $total, $wa
);

if(mysqli_stmt_execute($stmt)){
    echo "success";
}else{
    echo mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>