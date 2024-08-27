<?php

include("conn.php");

$name = $_POST['brand'];

 $con -> query("INSERT INTO `brand`(`name`) VALUES ('$name')");
header("location:../brand.php");