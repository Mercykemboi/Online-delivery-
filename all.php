<?php
session_start();
if(!isset($_SESSION['seller_id'])){
	header("location:loginSeller.php");
	exit;
}

include 'connect.php';

$all="SELECT * FROM Deliver ";

// $set=$_GET["deliver_id"];

$seller_id = $_SESSION['seller_id'] ?? null;
$select="SELECT deliver.*, Customer.Name as Customer_Name, rider.Name as Rider_Name
    FROM deliver INNER JOIN Customer ON customer.customer_id=deliver.customer_id INNER JOIN rider ON rider.Riders_id=deliver.Riders_id
    WHERE deliver.seller_id = ".$seller_id;

$query = mysqli_query($connection, $select);
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
								<th class="column1">deliver_id</th>
								<th class="column2">customerName</th>
								<th class="column3">ridersName</th>
								<th class="column4">Item</th>
								<th class="column5">Quantity</th>
								<th class="column6">Status</th>
                                <th class="column7">Details</th>
							</tr>
						</thead>
						<tbody>
                            
<?php while ($row=mysqli_fetch_array($query)) {?>
<tr>

<td class="column1"> <?php echo $row['deliver_id']; ?></td>
<td class="column2"> <?php echo $row['Customer_Name']; ?></td> 
<td class="column3"> <?php echo $row['Rider_Name']; ?></td>
<td class="column4"><?php echo $row['item']; ?></td>
<td class="column5"> <?php echo $row['quantity']; ?></td>
<td class="column6"><?php echo $row['status']; ?></td>
<td class="column7"> <a href="details.php?id=<?= $row['deliver_id'] ?>" > View Details</a> </td>
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

