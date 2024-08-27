<?php
include("conn.php");
$id = $_GET['id'];
$con -> query("DELETE FROM `brand` WHERE id ='$id'");
header("location:../brand.php");
