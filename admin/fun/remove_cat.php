<?php


include("conn.php");

$id = $_GET['id'];

$delete= "DELETE FROM cat WHERE id = '$id'";

$con -> query($delete);

header("location:../cat.php");