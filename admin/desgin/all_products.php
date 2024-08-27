

<?php

$sql = "SELECT * FROM products";
$result = $con -> query($sql);


?>


<table class=" table table-dark">
  <thead class="bg-info">
    <tr >
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">count</th>
      <th scope="col">des</th>
      <th scope="col">brand</th>
      <th scope="col">cat</th>
      <th scope="col">image</th>
      <th scope="col">Controls</th>
    </tr>
  </thead>
  <tbody>

  <?php
    while ($row = $result -> fetch_assoc()) {
       ?>


            <tr>
            <th scope="row"><?= $row['id'] ?></th>
            <td><?= $row['name'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['count'] ?></td>
            <td><?= $row['des'] ?></td>
            <td><?php $brand_id=$row['brand'];
            $sql_brand = "SELECT * FROM brand WHERE id = $brand_id" ;
            $result_brand = $con -> query($sql_brand);
            $row_brand = $result_brand -> fetch_assoc();
            echo $row_brand['name']; 
            ?></td>
                    <td><?php $cat_id=$row['cat'];
            $sql_cat = "SELECT * FROM cat WHERE id = $cat_id";
            $result_cat = $con -> query($sql_cat);
            $row_cat = $result_cat -> fetch_assoc();
            echo $row_cat['name']; 
            ?></td>
            <td><img src="img/<?=$row['image'] ?>"style="width:100px; height:100px;"></td>
            <td>
            <a class="btn btn-warning" href="?action=edit&id=<?=  $row['id'] ?>">Edit</a>        
            
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row['id']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?=$row['id']?>">You are sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?=$row['name']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="fun/remove_pro.php?id=<?= $row['id']?>">Delete</a> 
        
      </div>
    </div>
  </div>
</div>


 
        </td>
            </tr>




<?php
    }

?>

  </tbody>
</table>

<a class="btn btn-success" href="?action=add_product">Add product</a>