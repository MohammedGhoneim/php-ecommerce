


<?php

	@$error = $_GET['signup'];
	@$error_login = $_GET['login'];
	@$pro = $_GET['pro'];

?>





<!-- header -->
 <?php
	include("inc/header.php");
	?>
<!-- /header -->





	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="fun/login.php?pro=<?=$pro?>" method="POST">
							
							<input required  type="email" placeholder="Email Address" name="email"/>
							<input required  type="password" placeholder="password" name="password"/>
							<!-- <span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span> -->
							<div class="text-danger">
								<?=$error_login?>
							</div>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="fun/signup.php?pro=<?=$pro?>" method="POST">
							<input required  type="text" placeholder="Name" name="name"/>
							<input required  type="email" placeholder="Email Address" name="email"/>
							<input required  type="password" placeholder="Password" name="password"/>
							<label for="gender">Gender:</label>
							<select  id="gender" name="gender" >
								<option selected disabled >choose</option>
							<?php
							$select_gen="SELECT * FROM gender";
							$result_gen = $con -> query($select_gen);
							while($row_gen = $result_gen -> fetch_assoc()){
								?>
								<option value="<?=$row_gen['id']?>"><?=$row_gen['name']?></option>
								<?php
							}
							?>
							</select>
							<div class="text-danger">
								<?=$error?>
							</div>
							<br>
							<!-- <input type="submit" value="sginup" class="btn btn-default"> -->
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
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





