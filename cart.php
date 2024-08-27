<!-- header -->
<?php
	include("inc/header.php");
	?>
<!-- /header -->
<?php

if(isset($_SESSION['userid'])){
	$user = $_SESSION['userid'];

	$select_cart = "SELECT * FROM cart WHERE user = '$user'";
	$result = $con -> query($select_cart);
	$num = $result -> num_rows;

	if (isset($_POST['country'])) {
		$_SESSION['selected_country_id'] = $_POST['country'];
		$id_country=$_SESSION['selected_country_id'];
		$result_id_country=$con->query("SELECT * FROM country WHERE id = '$id_country'");
		$row_id_country=$result_id_country->fetch_assoc();
		$name_country=$row_id_country['name'];
	}

}


?>



<?php 

 if(!isset($_GET['action'])){

  ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					
	
					<?php
						while($row = $result -> fetch_assoc()){
							?>
						<tr>
							<td class="cart_product ">
								<a href=""><img src="admin/img/<?=$row['image']?>" style="width:54px;height:100%;"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$row['name_pro']?></a></h4>
								<p>Web ID: <?=$row['id']?></p>
							</td>
							<td class="cart_price">
								<p>$<?php
								if($row['count']>1){
									
									$price = ($row['price'])/($row['count']);
									echo $price;
								}else{
									echo $row['price'];
								}
								?>
								</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="fun/update-cart.php?action=plus&&id=<?=$_SESSION['userid']?>&&proid=<?=$row['id']?>"> + </a>
								
									<input class="cart_quantity_input" type="text" name="quantity" value="<?=$row['count']?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="fun/update-cart.php?action=neg&&id=<?=$_SESSION['userid']?>&&proid=<?=$row['id']?>"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?=$row['price']?></p><?php @$total_price += $row['price']; ?>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="fun/delet_one_item.php?id=<?=$row['id']?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
	
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="col">
					<div class="total_area">
						<?php
							if ($num > 0) {
								?>
								<ul>
							<li>Cart Sub Total <span><?=@$total_price?></span></li>
							<li>Eco Tax <span>$2</span></li> <?php @$total_price_with_tax = $total_price + 2; ?>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?=$total_price_with_tax?></span></li>
							<br>
							<a style="Width:30%; padding:7px 0; margin:auto; display:block;" class="btn btn-default check_out " href="?action">Follow the purchase process</a>
						</ul>


								<?php

							}else{
								echo "<p class='alert alert-warning text-center'>No items</p>";
							}


						?>
						
							
				</div>
		</div>
	</section> <!--/#cart_items-->


  <?php



  }elseif(isset($_GET['action'])){
	?>

<section style="width:80%; margin:auto;">
		<div class="container">
			<div class="heading">
				<p text-warning><?=$_GET['action']?></p>
				<h3>Add your address</h3>
			
			</div>
			<div class="row">
				<div class="col-sm-12  ">
					<div class="chose_area ">
						
						<ul class="user_info d-flex justify-content-center">
							<li class="single_field ">
								<form action="<?=$_SERVER['PHP_SELF']?>?action" method="post" >
								<label>Country:</label>
								<?php $sql_country = "SELECT * FROM country";
									$result_country = $con -> query($sql_country);
								?>
								<select  class="form-control" name="country" onchange="this.form.submit()">
								<option selected disabled>Select a country</option>
									<?php
									while($row_country = $result_country -> fetch_assoc()){
										?>

										<option  value="<?=$row_country['id']?>" ><?= $row_country['name'] ?></option>
									<?php
									}
									?>
									
								</select>
								</form>
									<p><?=@$name_country?></p>
							</li>

							<?php if (isset($_SESSION['selected_country_id'])){ 



								@$selected_country_id = $_SESSION['selected_country_id'];
								
								?>
		<form action="fun/checkout.php" method="POST">
							<li class="single_field">
								<input type="hidden" name="country" value="<?=$selected_country_id?>">
								<label>Region / State:</label>
								<select class="form-control" name="state">
								<?php $sql_state = "SELECT * FROM states WHERE id_country = '$selected_country_id'";
									$result_state = $con -> query($sql_state);
								?>
								<?php
								while($row_states_selected = $result_state->fetch_assoc()){
									?>

									<option value="<?= $row_states_selected['id']?>" ><?= $row_states_selected['name']?></option>
									<?php
								}

								?>
									
								</select>
							
							</li>
								<?php }?>

								
							
							
						</ul>
						<label for="adress">Add your address</label>
						<textarea required class="form-control" name="address" id="adress" cols="30"></textarea>
								<br>
						<input class="btn btn-success form-control" type="submit" value="Buy now ">
						

		</form>
					</div>
				</div>
		
			</div>
		</div>
</section><!--/#do_action-->

<?php
  }
?>






<br><br><br>










<!-- footer -->

	<?php
		include("inc/footer.php");
	?>
<!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


<?php
// $sql_price = "SELECT * FROM cart WHERE "


?>