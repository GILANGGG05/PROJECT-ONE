<?php

include "../koneksi.php";

$order_id = "ORD".time();

$game = "Mobile Legends";
$user_id = $_POST['userid'];
$server = $_POST['server'];
$diamond = $_POST['diamond'];
$payment = $_POST['payment'];
$price = $_POST['price'];
$wa = $_POST['wa'];

$status = "Pending";

mysqli_query($conn,"INSERT INTO orders
(order_id,game,user_id,server_id,diamond,payment,price,whatsapp,status)
VALUES
('$order_id','$game','$user_id','$server','$diamond','$payment','$price','$wa','$status')
");

echo $order_id;

?>