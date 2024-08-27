<!-- header -->
 <?php
	include("inc/header.php");
	?>
<!-- /header -->
	













	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php
					include("inc/left-side.php");
					?>
				</div>
				<?php
				if(isset($_GET['catid'])){
					$catid = $_GET['catid'];
					$select_1 = "SELECT * FROM products WHERE cat = '$catid' ";

				}elseif(isset($_GET['brandid'])){
					$brandid = $_GET['brandid'];
					$select_1 = "SELECT * FROM products WHERE brand = '$brandid' ";

				}else{
					$select_1 = "SELECT * FROM products ";

				}
				?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
						$result_1 = $con -> query($select_1);
						while($row_1 = $result_1 -> fetch_assoc()){
							?>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin/img/<?=$row_1['image']?>" style="height:240px;" />
											<h2>$<?=$row_1['price']?></h2>
											<p><?=$row_1['name']?></p>
											<a href="product-details.php?proid=<?=$row_1['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?=$row_1['price']?></h2>
												<p><?=$row_1['name']?></p>
												<a href="product-details.php?pro=<?=$row_1['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	


















<!-- footer -->
<?php

include("inc/footer.php");

?>

<!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>