<?php
$id = $_GET['idcou'];
$result_edit_states = $con -> query("SELECT * FROM states WHERE id_country = '$id'");


?>

<form action="fun/editstates.php?id=<?=$id?>" method="POST"  style="width:80%; margin:auto;">
<label for="states">Name states:</label>
<?php
while($row_edit_states = $result_edit_states->fetch_assoc()){
?>
<!-- /شرح -->
<input class="form-control" type="text" name="states[<?=$row_edit_states['id']?>]" id="country" required value="<?=$row_edit_states['name']?>" >

<?php
}
?>
<input class="form-control bg-success" type="submit" value="edit">

<br>
</form>
    <!-- <div style="width:80%; margin:auto;  text-align:center;">

        <a  class="btn btn-info " href="desgin/add_states.php?id=">Add states</a>
    </div> -->


