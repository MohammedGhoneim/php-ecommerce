<?php
    $id=$_GET['id'];
    


$result_edit_cat = $con -> query("SELECT * FROM cat WHERE id = '$id'");
$row_edit_cat = $result_edit_cat->fetch_assoc();

?>

<form action="fun/editcat.php?id=<?=$id?>" method="POST"  style="width:80%; margin:auto;">
<label for="cat">Name Country:</label>
<input class="form-control" type="text" name="cat" id="cat" required placeholder="<?=$row_edit_cat['name']?>" >
<br>
<input class="form-control bg-success" type="submit" value="edit">
</form>


<?php

