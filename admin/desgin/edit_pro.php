<?php

$id_pro = $_GET['id'];
$select = "SELECT * FROM products WHERE id = '$id_pro'";
$result = $con -> query($select);

$row_product = $result -> fetch_assoc();

?>

<form method="POST" action="./fun/do_edite_pro.php?id=<?= $row_product['id']?>" enctype="multipart/form-data">
    
<div class="form-group">
    <input class="form-control" type="text" placeholder="Name" name="name" value="<?= $row_product['name']?>">
</div>
<div class="form-group">
    <input class="form-control" type="number" placeholder="price" name="price" value="<?= $row_product['price']?>">
</div>
<div class="form-group">
    <input class="form-control"  type="number" placeholder="count" name="count" value="<?= $row_product['count']?>">
</div>
<div class="form-group">
    <input class="form-control" type="text" placeholder="description" name="des" value="<?= $row_product['des']?>">
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
        <option value="<?= $row_brand['id']?>" <?php
            if ($row_brand['id'] === $row_product['brand']) {
                echo "selected";
            }
        
        ?>><?= $row_brand['name']?></option>
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
        <option value="<?= $row_cat['id']?>" <?php
            if ($row_cat['id'] === $row_product['cat']) {
                echo "selected";
            }
        
        ?>><?= $row_cat['name']?></option>
<?php
    }
    ?>
   </select>
</div>


<div class="form-group">
    <input class="form-control " type="file" name="image" >
    <br>
    <img src="img/<?= $row_product['image']?>" style="width:100px; height:100px;">
</div>
<div class="form-group ">
    <input class="btn btn-success " type="submit"  value="Update product">
</div>

</form>