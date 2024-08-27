<?php
session_start();

$pro =$_GET['pro'];

if(isset($_SESSION['username'],$_SESSION['userid'])){
    $user = $_SESSION['userid'];
header("location:cart-pro.php?pro=$pro&&user=$user");
}else{
    header("location:../login.php?pro=$pro");
}