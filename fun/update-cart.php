<?php

include("../admin/fun/conn.php");
$userid = $_GET['id'];
$proid = $_GET['proid'];
$action = $_GET['action'];
$sql_cart = "SELECT * FROM cart WHERE id = '$proid' AND user = '$userid'";
$result_cart = $con -> query($sql_cart);
$row_cart = $result_cart -> fetch_assoc();
$id_products = $row_cart['id_pro'];
$sql_products = "SELECT * FROM products WHERE id = '$id_products'";
$result_products= $con -> query($sql_products);
$row_products= $result_products -> fetch_assoc();
$result_count_pro = $con -> query("SELECT count FROM products WHERE id = '$id_products'");
$row_count_pro = $result_count_pro->fetch_assoc();
 $count_pro = $row_count_pro['count'];
@$old_count = $row_cart['count']; 

if($count_pro > $old_count){



 if($action==="plus" ){
    
    @$new_count = $old_count + 1 ;
    $old_price = $row_products['price']; 
    $new_price = $old_price * $new_count;
    $update_cart = "UPDATE `cart` SET `price`='$new_price',`count`='$new_count' WHERE id = '$proid' AND user = '$userid'";
    

    
    
}
}
if($action === "neg" && $old_count > 1){
    @$new_count = $old_count -1;
    $old_price = $row_products['price'];
    $new_price = $old_price * $new_count;
    $update_cart = "UPDATE `cart` SET `price`='$new_price',`count`='$new_count' WHERE id = '$proid' AND user = '$userid'";
    

}



header("location:../cart.php");
 $con -> query($update_cart);
