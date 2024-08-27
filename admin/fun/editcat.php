<?php
include("conn.php");
$id = $_GET['id'];

$name = $_POST['cat'];

$con = $con -> query("UPDATE `cat` SET `name`='$name' WHERE id = '$id'");
header("location:../cat.php");