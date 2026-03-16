<?php
$host = 'localhost';
$user = 'root';
$pass = '';  // kosong untuk Laragon/XAMPP
$db = 'project_one';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// PAKSA PAKAI UTF8MB4
mysqli_set_charset($conn, "utf8mb4");
mysqli_query($conn, "SET NAMES utf8mb4 COLLATE utf8mb4_general_ci");

?>