<?php
    $id=$_GET['id'];
    


$result_edit_brand = $con -> query("SELECT * FROM brand WHERE id = '$id'");
$row_edit_brand = $result_edit_brand->fetch_assoc();

?>

<form action="fun/editbrand.php?id=<?=$id?>" method="POST"  style="width:80%; margin:auto;">
<label for="brand">Name Country:</label>
<input class="form-control" type="text" name="brand" id="brand" required placeholder="<?=$row_edit_brand['name']?>" >
<br>
<input class="form-control bg-success" type="submit" value="edit">
</form>


<?php

