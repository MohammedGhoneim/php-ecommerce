<?php
include("conn.php");
$id = $_GET['id'];
$con -> query("DELETE FROM `states` WHERE id_country ='$id'");
header("location:../country.php");
