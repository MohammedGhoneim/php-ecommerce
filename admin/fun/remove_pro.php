<?php

include("conn.php");

$id = $_GET['id'];

$delete= "DELETE FROM products WHERE id = '$id'";

$con -> query($delete);

header("location:../products.php");