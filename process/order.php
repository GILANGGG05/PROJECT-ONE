<?php
include '../koneksi.php';

$game    = $_POST['game'] ?? 'Unknown';
$user_id = $_POST['user_id'] ?? null;
$server  = $_POST['server'] ?? '';
$diamond = $_POST['diamond'] ?? null;
$payment = $_POST['payment'] ?? null;

if (!$user_id || !$diamond || !$payment) {
    die("Form belum dikirim atau data kosong!");
}

$sql = "INSERT INTO orders (game, user_id, server, diamond, payment)
        VALUES ('$game', '$user_id', '$server', '$diamond', '$payment')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../admin/list_order.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>