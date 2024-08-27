<?php
include("conn.php");
$id = $_GET['id'];

$name = $_POST['brand'];

$con = $con -> query("UPDATE `brand` SET `name`='$name' WHERE id = '$id'");
header("location:../brand.php");