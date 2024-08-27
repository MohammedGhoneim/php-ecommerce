
<?php
$status = "country"

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
	<style>
		table thead th{
			text-align:center;
		}
		tr th{
			text-align:center;
		}
		 td{
			text-align:center;
		}
	</style>
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
		<h1 class="text-center">Countries</h1>
		</div><!--/.row-->
		
		

		
		
	<?php
		if(!isset($_GET['action'])){
			?>
			<table  class="table ">
			<thead class="">
			  <tr class="bg-info ">
				<th>id</th>
				<th>Country</th>
				<th>states</th>
				<th>Controls</th>
				
			  </tr> 
			</thead>
			<tbody>
			  <?php
			  $result_country = $con -> query("SELECT * FROM country");
			  while($row_country = $result_country -> fetch_assoc()){
				  ?>
				  <tr>
				<th><?=$row_country['id']?></th>
				<td><?=$row_country['name']?></td>
				<td><?php $id_country=$row_country['id'];
					$result_state = $con -> query("SELECT * FROM states WHERE id_country = '$id_country'");
					while($row_state = $result_state -> fetch_assoc()){
						?>
						<?=$row_state['name'] .","?>
						<?php
					}
				?></td>
				<td><a class="btn btn-warning" href="?action=edit&&id=<?=$row_country['id']?>">Edit</a>
					
						<!-- Delete -->

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_country['id']?>">
 						 Delete
						</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_country['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row_country['id']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?=$row_country['id']?>">You are sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?=$row_country['name']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="fun/remove_country.php?id=<?= $row_country['id']?>">Delete</a> 
        
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
		  
		  <a class="btn btn-success" href="?action=addcountry">Add New Country</a>
		  </div>	<!--/.main-->
			  
		<?php 
		}if(@$_GET['action']==="addcountry"){
			include("desgin/add_country.php");
			
		}elseif(@$_GET['action']==="addstates"){
			include("desgin/add_states.php");
		}elseif(@$_GET['action']==="edit"){
			include("desgin/editcountry.php");

		}elseif(@$_GET['action']==="editstate"){
			include("desgin/editstate.php");
			
		}





	?>
		
	
	
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

