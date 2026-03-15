<?php
$conn = mysqli_connect("localhost","admin","123456","PROJECT_ONE");

if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>