<?php

include("inc/header.php");
$user = $_SESSION['userid'];
$resul_check = $con -> query("SELECT * FROM `checkout` WHERE user = '$user'");
$num = $resul_check -> num_rows;

?>


<!-- <a class="btn btn-warning" href="fun/logout.php">Logout </a> -->
<?php
if($num > 0){
?>

<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">address</td>
							<td class="total">status</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					
	
					<?php
						while($row = $resul_check  -> fetch_assoc()){
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
									
									$price = ($row['price_pro'])/($row['count']);
									echo $price;
								}else{
									echo $row['price_pro'];
								}
								?>
								</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!-- <a class="cart_quantity_up" href="fun/update-cart.php?action=plus&&id=<?=$_SESSION['userid']?>&&proid=<?=$row['id']?>"> + </a> -->
								
									<input disabled class="cart_quantity_input" type="text" name="quantity" value="<?=$row['count']?>" autocomplete="off" size="2">
									<!-- <a class="cart_quantity_down" href="fun/update-cart.php?action=neg&&id=<?=$_SESSION['userid']?>&&proid=<?=$row['id']?>"> - </a> -->
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?=$row['price_pro']?></p><?php @$total_price += $row['price_pro']; ?>
							</td>
                            <td>
                                <p style="width:70px; height:70px;  overflow:scroll;"> <?=$row['address']?></p>
                            </td>
                            <td>
                                <p > <?=$row['status']?></p>
                            </td>
							<?php
							if($row['status']==="waiting"){
								?>
										<td class="cart_delete">
								<a class="cart_quantity_delete" href="fun/delet_one_item.php?delete=<?=$row['id']?>"><i class="fa fa-times"></i></a>
							</td>
							<?php
							}
							?>
							<!-- delete icon -->
						</tr>
	
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="col">
					<div class="total_area">
						
								<ul>
							<li>Cart Sub Total <span><?=@$total_price?></span></li>
							<li>Eco Tax <span>$2</span></li> <?php @$total_price_with_tax = $total_price + 2; ?>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?=$total_price_with_tax?></span></li>
							<br>
							
						</ul>


						
							
				</div>
		</div>
	</section>
<?php
}else{
    echo "<p class='alert alert-warning text-center'>Welcom Back No items chossed</p>";
}


?>









<?php

include("inc/footer.php");

?>