<?php

session_start();


include("../admin/fun/conn.php");
if(isset($_SESSION['selected_country_id'])){
    unset($_SESSION['selected_country_id']); 
$country=$_POST['country'];  
$state= $_POST['state'] ;
$addres= $_POST['address'] ;
$userid=$_SESSION['userid'];
$sql_cart = "SELECT * FROM `cart` WHERE user = '$userid'";

$result_cart = $con->query($sql_cart);
$num_pro = $result_cart->num_rows;
while ($row_cart = $result_cart->fetch_assoc()) {
    $name_cart = $row_cart['name_pro'];
    $price_pro = $row_cart['price'];
    $count = $row_cart['count'];
    $image = $row_cart['image'];
    $id_pro = $row_cart['id_pro'];
    $user = $userid;
    $country_add = $country;
    $state_add = $state;
    $addres_add = $addres;
    $status="waiting";
    $sql_checkout = "INSERT INTO `checkout`( `name_pro`, `price_pro`, `count`, `image`, `id_pro`, `user`, `country`, `state`, `address`, `status`) VALUES ('$name_cart','$price_pro','$count','$image','$id_pro','$user','$country_add','$state_add','$addres_add','$status')";
    $con->query($sql_checkout);
    header("location:removefromcart.php");
}






}else{
    $error="Please Enter Country And State";
    header("location:../cart.php?action=$error");
}
