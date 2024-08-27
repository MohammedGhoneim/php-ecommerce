



<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							
						
						
						<?php
						$x=0;
						$select = "SELECT * FROM products LIMIT 3"	;
						$result = $con -> query($select);
						while($row = $result -> fetch_assoc()){
														?>

									<div class="item <?php  if($x===0){echo "active"; $x++;} ?>">
									<div class="col-sm-6">
										<h1><span>E</span>-SHOPPER</h1>
										<h2><?=$row['name']?></h2>
										<p><?=$row['des']?> </p>
										<button type="button" class="btn btn-default get">Get it now</button>
									</div>
									<div class="col-sm-6">
										<img src="admin/img/<?=$row['image']?>" class="girl img-responsive" style="height:350px;" />
										<h3 style="padding:10px;color:white; background:black;border-radius: 50% 10%;;" class="pricing"><?=$row['price']?>$</h3>
									</div>
									</div>


						<?php		
						}	
						?>
						
							
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>