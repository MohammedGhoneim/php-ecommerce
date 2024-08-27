<?php
include("conn.php");
$id = $_GET['id'];
$con -> query("DELETE FROM `country` WHERE id ='$id'");
header("location:removestate.php?id=$id");
