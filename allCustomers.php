<?php
session_start();
include 'connect.php';

$all="SELECT * FROM Customer ";

// $set=$_GET["deliver_id"];

// $seller_id = $_SESSION['seller_Id'] ?? null;
// $select="SELECT deliver.*, Customer.fName as Customer_fName, rider.fName as Rider_fName
//     FROM deliver INNER JOIN Customer ON customer.customer_id=deliver.customer_id INNER JOIN rider ON rider.Riders_id=deliver.Riders_id
//     WHERE deliver.seller_id = ".$seller_id;

$query = mysqli_query($connection, $all);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customers </title>
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
                   <!-- <h2 style="align-item:center;"> Customers in the System</h2> -->
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">customer_id</th>
								<th class="column2">Name</th>
								<th class="column4">Email</th>
								<th class="column5">Phone No</th>
								<th class="column6">Postal Address</th>
                              
							</tr>
						</thead>
						<tbody>
                            
<?php while ($row=mysqli_fetch_array($query)) {?>
<tr>

<td class="column1"> <?php echo $row['customer_id']; ?></td>
<td class="column2"> <?php echo $row['Name']; ?></td>

<td class="column4"><?php echo $row['Email']; ?></td>
<td class="column5"> <?php echo $row['phoneNo']; ?></td>
<td class="column6"><?php echo $row['PostalA']; ?></td>

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
