<?php
session_start();
$user = $_SESSION['userid'];
$pro = $_GET['pro'];
if($pro === ""){
   header("location:../index.php");
}else{
   include("../admin/fun/conn.php");

$sql_cart = "SELECT * FROM cart WHERE id_pro = '$pro' AND user = '$user'";
$result_cart = $con -> query($sql_cart);
$row_cart = $result_cart -> fetch_assoc();
$num = $result_cart -> num_rows;

$sql = "SELECT * FROM products WHERE id = '$pro'";
$result =  $con -> query($sql);
$row = $result -> fetch_assoc();
$name_pro = $row['name'];
$price_pro = $row['price'];
$count_pro = 1;
$des_pro = $row['des'];
$brand_pro = $row['brand'];
$cat_pro = $row['cat'];
$image_pro = $row['image'];

if($num > 0){

    @$old_count = $row_cart['count']; 
    @$new_count = $old_count + 1 ;
    $old_price = $row_cart['price'];
    $new_price = $old_price * $new_count;

   $insert =  "UPDATE `cart` SET `price`='$new_price',`count`='$new_count' WHERE id_pro = '$pro' AND user = '$user'";







}
else{
 
   $insert = "INSERT INTO `cart`(`id_pro`,`name_pro`, `price`, `count`, `des`, `brand`, `cat`, `image`, `user`) VALUES ('$pro' , '$name_pro','$price_pro','$count_pro','$des_pro','$brand_pro','$cat_pro','$image_pro','$user')";

}


$con -> query($insert);
header("location:../product-details.php?pro=$pro");
}