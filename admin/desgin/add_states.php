
<?php
    $result_country = $con -> query("SELECT * FROM country ORDER BY id DESC LIMIT 1");
    $row_country = $result_country -> fetch_assoc();
    @$id_country = $row_country['id'];
   
?>





<form action="fun/addstate.php?id=<?=$id_country?>" method="POST"  style="width:80%; margin:auto;">
			<label for="country">Name country:</label>
        <input class="form-control" value="<?=$row_country['name'] ?>" disabled >
			<label for="state">Name State:</label>
			<input class="form-control" type="text" name="state" id="state" required  >
			<br>
			<input class="form-control bg-success" type="submit" value="Add another one">
            <br><br><br>
            <a class="btn btn-info" style="width:30%; padding:7px; display:block; margin:auto;" href="country.php"> Done </a>
		</form>

 