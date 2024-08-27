<?php
$id = $_GET['id'];
$result_edit_country = $con -> query("SELECT * FROM country WHERE id = '$id'");
$row_edit_country = $result_edit_country->fetch_assoc();

?>

<form action="fun/editcountry.php?id=<?=$id?>" method="POST"  style="width:80%; margin:auto;">
<label for="country">Name Country:</label>
<input class="form-control" type="text" name="country" id="country" required value="<?=$row_edit_country['name']?>" >
<br>
<input class="form-control bg-success" type="submit" value="edit">
</form>


