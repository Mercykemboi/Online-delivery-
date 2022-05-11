<?php
session_start();
include 'connect.php';

$all="SELECT * FROM Seller ";

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
	<title>Sellers</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">seller_id</th>
								<th class="column2">Name</th>
								
								<th class="column4">Email</th>
								<th class="column5">Phone No</th>
								<th class="column6">Postal Address</th>
                              
							</tr>
						</thead>
						<tbody>
                            
<?php while ($row=mysqli_fetch_array($query)) {?>
<tr>

<td class="column1"> <?php echo $row['seller_id']; ?></td>
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


	



</body>
</html>

