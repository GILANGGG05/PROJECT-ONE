<?php
$host = "localhost";     // Server database, di Laragon biasanya localhost
$user = "root";          // Username database default Laragon
$pass = "";              // Password default kosong
$db   = "argo_store";    // Nama database yang sudah dibuat

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error()); // Jika gagal, hentikan script
}
?>