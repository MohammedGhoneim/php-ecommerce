<!-- header -->
 <?php
	include("inc/header.php");
	@$pro = $_GET['pro'];

	
	$select_pro = "SELECT * FROM products WHERE id ='$pro'";
	$result_pro = $con -> query($select_pro);
	$row_pro = $result_pro -> fetch_assoc();
	
	
		@$old_views = $row_pro['views'];
		$new_views = $old_views +1;
		$update = "UPDATE products SET views = '$new_views' WHERE id = '$pro'";
		$con -> query($update);
	
	
	?>
<!-- /header -->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php
					include("inc/left-side.php");
					?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/img/<?=$row_pro['image']?>" style="width:360px; height:380px;" />
								<!-- <h3>ZOOM</h3> -->
							</div>
							<!-- <div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  ** Wrapper for slides **
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  **Controls **
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div> -->

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="admin/img/<?=$row_pro['image']?>" class="newarrival" style="width50px;height:50px;" />
								<h2><?=$row_pro['name']?></h2>
								<p>Web ID: <?=$row_pro['id']?></p>
								<img src="admin/img/<?=$row_pro['image']?>" style="width:50px;height:50px;" />
								<span>
									<span>US $<?=$row_pro['price']?></span>
									<label>Quantity: </label>
									<input type="text" value="<?=$row_pro['count']?>" />
									<a style="<?= $row_pro['count'] > 0 ? "display:inline-block;" : "display:none;" ?>" href="fun/checkuser.php?pro=<?=$row_pro['id']?>" class="btn btn-default cart"><i class="fa fa-shopping-cart"></i>
									Add to cart</a>
								
								</span>
								<p><b>Availability:</b> <?= $row_pro['count'] > 0 ? "in stock" : "out of stock" ?></p>
								<p><b>Brand:</b> <?=$row_pro['brand']?></p>
								<p><b>views:</b> <?= $row_pro['views'] ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$select = "SELECT * FROM products LIMIT 3";
								$result = $con -> query($select);
								$x=0;
								?>
								<div class="item active <?php if($x===0){echo "active"; $x++;} ?>">
									<?php
									
										while( $row = $result ->fetch_assoc()){
											?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/img/<?=$row['image']?>" style="height:200px;" />
													<h2>$<?=$row['price']?></h2>
													<p><?=$row['des']?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>




											<?php
										}
									?>
									
							
								</div>

							

								<?php
								$select = "SELECT * FROM products  ORDER BY price LIMIT 3";
								$result = $con -> query($select);
								
								?>
								<div class="item">
									<?php
									
										while( $row = $result ->fetch_assoc()){
											?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/img/<?=$row['image']?>" style="height:200px;" />
													<h2>$<?=$row['price']?></h2>
													<p><?=$row['des']?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>




											<?php
										}
									?>
									
							
								</div>








								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
					
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