<?php

include("conn.php");

$name = $_POST['cat'];

 $con -> query("INSERT INTO `cat`(`name`) VALUES ('$name')");
header("location:../cat.php");
