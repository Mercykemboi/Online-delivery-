<?php
session_start();
if(!isset($_SESSION['customer_id'])){
	header("location:loginCustomer.php");
	exit;
}
$set=$_GET['id'];

include 'connect.php';

$all="SELECT * FROM updates WHERE deliver_id=$set ";


$query = mysqli_query($connection, $all);
// echo $select;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Deliveries</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">InfoStatus</th>
								<th class="column2">AdditionalInformation</th>
								<th class="column3">Expected Time</th>
							</tr>
						</thead>
						<tbody>
                            
<?php while ($row=mysqli_fetch_array($query)) {?>
<tr>


<td class="column2"> <?php echo $row['InfoStatus']; ?></td> 
<td class="column3"> <?php echo $row['additionalItem']; ?></td>
<td class="column4"><?php echo $row['Time']; ?></td>
</tr>
<?php } ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

