<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?=$_SESSION['login'] ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php if ($status === "dashboard") {
				echo "active";
			} ?>"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

			<li class="<?php if ($status === "products") {
				echo "active";
			} ?>"><a href="products.php"><em class="fa fa-product-hunt">&nbsp;</em> Proudcts</a></li>

			<li class="<?php if ($status === "brand") {
				echo "active";
			} ?>" ><a href="brand.php"><em class="fa fa-bullhorn">&nbsp;</em> brand</a></li>

			<li class="<?php if ($status === "cat") {
				echo "active";
			} ?>" ><a href="cat.php"><em class="fa fa-cube">&nbsp;</em> category</a></li>

			<li class="<?php if ($status === "counrty") {
				echo "active";
			} ?>" ><a href="country.php"><em class="fa fa-globe">&nbsp;</em> Country</a></li>

			<li class="<?php if ($status === "orders") {
				echo "active";
			} ?>" ><a href="orders.php"><em class="fa fa-user">&nbsp;</em> orders</a></li>

			<li><a href="fun/logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->