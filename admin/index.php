<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
$user= $_POST['user'];
$password= $_POST['password'];
// $pass_conv = md5($password);


include("fun/conn.php");

$sql = "SELECT * FROM users WHERE username = '$user' && password = '$password' ";

$result = $con -> query($sql);
$row = $result -> fetch_assoc();
$num = $result -> num_rows;

if($num > 0 && $row['pr'] == 1){
	session_start();
	$_SESSION['login'] = $user;
	header("location:dashboard.php");
	
}
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="<?= $_SERVER['PHP_SELF']?>" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="user" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" >
							</div>
							
							<input type="submit"  class="btn btn-primary" value="login">
							<?php
									if ($_SERVER['REQUEST_METHOD'] === 'POST') {
										

										@$username = $row['username'];
										if($num > 0 && $row['pr'] == 2){
											echo "<p class='alert alert-warning'> welcom $username you are admin not allowed to joine this page  </p>";


										}elseif($num > 0 && $row['pr'] == 4){
											echo "<p class='alert alert-warning'> welcom $username you are Supervisor not allowed to joine this page  </p>";
										}else{
											echo "<p class='alert alert-warning'>data wrong</p>";
										}

										


									}
							?>
							
								
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>










