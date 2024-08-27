
<?php

$sql_brand = "SELECT * FROM brand";
$result_brand = $con -> query($sql_brand);


?>


<table class=" table table-dark">
  <thead class="bg-info">
    <tr >
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">controls</th>
    </tr>
  </thead>
  <tbody>

  <?php
    while ($row_brand = $result_brand -> fetch_assoc()) {
       ?>


            <tr>
            <th scope="row"><?= $row_brand['id'] ?></th>
            <td><?= $row_brand['name'] ?></td>
            <td>
            <a class="btn btn-warning" href="?action=edit&id=<?=  $row_brand['id'] ?>">Edit</a>        
            
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_brand['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_brand['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row_brand['id']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?=$row_brand['id']?>">You are sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?=$row_brand['name']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="fun/remove_brand.php?id=<?= $row_brand['id']?>">Delete</a> 
        
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

<a class="btn btn-success" href="?action=addbrand">Add product</a>