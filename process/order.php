<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

require "../koneksi.php";

$user_id = $_POST['user_id'];
$server_id = $_POST['server_id'];
$diamond = $_POST['diamond'];
$payment = $_POST['payment'];
$total = $_POST['total'];
$wa = $_POST['wa'];

$sql = "INSERT INTO orders (user_id,server_id,diamond,payment,total,wa)
VALUES ('$user_id','$server_id','$diamond','$payment','$total','$wa')";

if(mysqli_query($conn,$sql)){
    echo "success";
}else{
    echo mysqli_error($conn);
}

?>