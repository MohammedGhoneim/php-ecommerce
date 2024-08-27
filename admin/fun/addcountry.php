<?php
include("conn.php");
$get_country = $_POST['country'];
            
$con ->query("INSERT INTO `country` (`name`) VALUES ('$get_country')");

header("location:../country.php?action=addstates");