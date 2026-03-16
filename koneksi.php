<?php
$conn = mysqli_connect("localhost","root","","PROJECT_ONE");
mysqli_set_charset($conn, "utf8mb4");
if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>