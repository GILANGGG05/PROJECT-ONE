<?php

include "koneksi.php";

$game_id = $_POST['game_id'];
$server_id = $_POST['server_id'];
$diamond = $_POST['diamond'];

$price = 20000;

mysqli_query($conn,"INSERT INTO orders 
(game_id,server_id,diamond,price)
VALUES
('$game_id','$server_id','$diamond','$price')
");

header("Location:list_order.php");

?>