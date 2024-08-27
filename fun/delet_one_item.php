<?php




include("../admin/fun/conn.php");


if(isset($_GET['delete'])){

    $id_shapping = $_GET['delete'];

    $sql = "DELETE FROM `checkout` WHERE id = '$id_shapping' ";
    $con -> query($sql);
    header("location:../account.php");


}else{
    $id = $_GET['id'];
$sql = "DELETE FROM `cart` WHERE id = '$id' ";
$con -> query($sql);

    header("location:../cart.php");

}
