<?php

session_start();
$userid=$_SESSION['userid'];
include("../admin/fun/conn.php");
$con->query("DELETE FROM `cart` WHERE user= '$userid' ");
// $con->query("UPDATE `products` SET `count`='[value-4]'");
header("location:../index.php");
