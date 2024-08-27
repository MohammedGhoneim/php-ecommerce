<?php
include("conn.php");
$id = $_GET['id'];
$result_states = $con -> query("SELECT * FROM states WHERE id_country = '$id'");
$row_states = $result_states -> fetch_assoc();

foreach($_POST["states"] as $state_id => $state_name){

    $con ->query("UPDATE `states` SET `name`='$state_name' WHERE id = '$state_id'");
    

}






header("location:../country.php");