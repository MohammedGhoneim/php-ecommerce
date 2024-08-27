<?php

$country = $_POST['country'];
$id = $_GET['id'];

include("conn.php");

$con ->query("UPDATE `country` SET `name`='$country' WHERE id = '$id'");

header("location:../country.php?action=editstate&&idcou=$id");