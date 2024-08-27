
<?php
$status = "orders"

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- NAV BAR -->

	<?php
	include("included/header.php")
	?>

	<!-- end NAV BAR -->
	 
	<!-- sidebar -->
	<?php

	include("included/sidebar.php")

?>
	<!-- end said bar -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">order</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			
				<h1 class="text-center">orders</h1>
			
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
		


			

<?php

$sql = "SELECT * FROM checkout ORDER BY id ASC";
$result = $con -> query($sql);
$num = $result -> num_rows;



?>


<table class=" table table-dark">
  <thead class="bg-info">
    <tr >
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">count</th>
      <th scope="col">image</th>
      <th scope="col">user</th>
      <th scope="col">country</th>
      <th scope="col">state</th>
      <th scope="col">address</th>
      <th scope="col">Controls</th>
    </tr>
  </thead>
  <tbody>

  <?php
  if($num > 0 ){
	$sql = "SELECT * FROM checkout ORDER BY user ASC";
	$result_user = $con -> query($sql);


    while ($row = $result_user -> fetch_assoc()) {
       ?>


            <tr>
            <th scope="row"><?= $row['id'] ?></th>
            <td><?= $row['name_pro'] ?></td>
            <td><?= $row['price_pro'] ?></td>
            <td><?= $row['count'] ?></td>
            <td><img src="img/<?=$row['image'] ?>"style="width:100px; height:100px;"></td>
            <td><?php $id_user_name= $row['user'];
			$result_user_name = $con -> query("SELECT * FROM users WHERE id = '$id_user_name'");
			$row_user_name=$result_user_name->fetch_assoc();
			echo $row_user_name['username'];
			?></td>
            <td><?php $id_country_name= $row['country'];
			$result_country_name = $con -> query("SELECT * FROM country WHERE id = '$id_country_name'");
			$row_country_name=$result_country_name->fetch_assoc();
			echo $row_country_name['name'];
			?></td>
            <td><?php $id_state_name= $row['state'];
			$result_state_name = $con -> query("SELECT * FROM states WHERE id = '$id_state_name'");
			$row_state_name=$result_state_name->fetch_assoc();
			echo $row_state_name['name'];
			?></td>
            <td><?= $row['address'] ?></td>
			<?php
				
				if($row['status'] === "shipping"){
					?>
					<td>
            <a class="btn btn-info" href="">shipping...</a>        
            </td>
					<?php
				}else{
						?>
						<td>
            			<a class="btn btn-warning" href="fun/acceptorder.php?id=<?=  $row['id'] ?>">Accept</a>        
						</td>

					<?php
				}

			?>
            <td>
            </td>
			
            </tr>
			



<?php
    }
}else{
	echo "<p class='alert alert-warning text-center'>No Order yat.</p>";
}
?>

  </tbody>
</table>





		





















			</div>
		</div><!--/.row-->
		
		
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>