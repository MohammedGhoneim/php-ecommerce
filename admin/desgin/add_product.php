





<form method="POST" action="./fun/do_add_pro.php" enctype="multipart/form-data">
    
<div class="form-group">
    <input class="form-control" type="text" placeholder="Name" name="name">
</div>
<div class="form-group">
    <input class="form-control" type="number" placeholder="price" name="price">
</div>
<div class="form-group">
    <input class="form-control"  type="number" placeholder="count" name="count">
</div>
<div class="form-group">
    <input class="form-control" type="text" placeholder="description" name="des">
</div>

<div class="form-group">
    <?php
    $sql_brand = "SELECT * FROM brand";
    $result_brand = $con -> query($sql_brand);
    ?>
   <select name="brand" class="form-control" >
    <option disabled selected>choose</option>
    <?php
    while($row_brand = $result_brand ->fetch_assoc()){
        ?>
        <option value="<?= $row_brand['id']?>"><?= $row_brand['name']?></option>
<?php
    }
    ?>
   </select>
</div>

<div class="form-group">
    <?php
    $sql_cat = "SELECT * FROM cat";
    $result_cat = $con -> query($sql_cat);
    ?>
   <select name="cat" class="form-control" >
   <option disabled selected>choose</option>

    <?php
    while($row_cat = $result_cat ->fetch_assoc()){
        ?>
        <option value="<?= $row_cat['id']?>"><?= $row_cat['name']?></option>
<?php
    }
    ?>
   </select>
</div>


<div class="form-group">
    <input class="form-control " type="file" name="image" >
</div>
<div class="form-group ">
    <input class="btn btn-primary " type="submit"  value="Add product">
</div>

</form>