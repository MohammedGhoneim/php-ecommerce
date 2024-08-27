

<?php
include("conn.php");

        $get_state = $_POST['state'];
        $id_country = $_GET['id'];

        $con->query("INSERT INTO `states`( `name`, `id_country`) VALUES ('$get_state','$id_country')");

header("location:../country.php?action=addstates");



?>
        