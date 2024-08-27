<?php


include("conn.php");
$id = $_GET['id'];
$status = "shipping";

$con -> query("UPDATE `checkout` SET `status`='$status' WHERE id = '$id'");
// count from check table
$result_check = $con -> query("SELECT  `count`, `id_pro` FROM `checkout` WHERE id = '$id'");
$row_check = $result_check -> fetch_assoc();

$count = $row_check['count'];
$id_pro = $row_check['id_pro'];
// count from products table
$result_pro =$con -> query("SELECT  `count` FROM `products` WHERE id = '$id_pro'");
$row_pro = $result_pro->fetch_assoc();
$old_count = $row_pro['count'];

$new_count= $old_count - $count  ;
$con -> query("UPDATE `products` SET `count`= '$new_count'");
header("location:../orders.php");