<?php
include("conn.php");


$id_pro = $_GET['id'];


$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$des = $_POST['des'];
@$brand = $_POST['brand'];
@$cat = $_POST['cat'];


if ($_FILES['image']['error']===0) {
 $img_name = $_FILES['image']['name'];
$img_tmp = $_FILES['image']['tmp_name'];
$img_size = $_FILES['image']['size'];

$img_exp= explode(".",$img_name);
$img_ext = end($img_exp);

$allow_ext = ["jpg","jpeg","gif","bmb","png"];

if (!in_array($img_ext  , $allow_ext)) {
    echo "image type error";
    exit();
}
if ($img_size > 3000000) {
        echo "file is big";
        exit();
}

$new_img_name = time().rand(1,100000) . $img_name;

move_uploaded_file($img_tmp,"../img/$new_img_name");

$update ="UPDATE `products` SET `name`='$name',`price`='$price',`count`='$count',`des`='$des',`brand`='$brand',`cat`='$cat',`image`='$new_img_name' WHERE id = '$id_pro'" ;

}else{


    $update ="UPDATE `products` SET `name`='$name',`price`='$price',`count`='$count',`des`='$des',`brand`='$brand',`cat`='$cat' WHERE id = '$id_pro'" ;


}



$con -> query($update);

header("location:../products.php");