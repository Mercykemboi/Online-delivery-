<?php
session_start();
if(!isset($_SESSION['customer_id'])){
	header("location:loginCustomer.php");
	exit;
}



include 'connect.php';

// $all="SELECT * FROM Deliver ";

// $set=$_GET["deliver_id"];

$customer_id = $_SESSION['customer_id'] ?? null;
$select="SELECT deliver.*, seller.Name as Seller_Name, rider.Name as Rider_Name
    FROM deliver INNER JOIN seller ON seller.seller_id=deliver.seller_id INNER JOIN rider ON rider.Riders_id=deliver.Riders_id
    WHERE deliver.customer_id = $customer_id";
// var_dump($customer_id);
$customer = mysqli_query($connection, $select);
// if($customer!== null){
    
// echo "<script type='text/javascript'>alert('Your product will be shipped shortly')</script>";
// }else{
//     echo "<script type='text/javascript'>alert('You can view your product')</script>";
// }

// echo $select;
// echo $select;
$customers = [];

while ($row=mysqli_fetch_array($customer)){
	array_push($customers, $row);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer Interface</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
	<link rel="stylesheet" type='text/css' media='screen' href="style.css">
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
							
								<th class="column2">Sellers Name</th>
								<th class="column3">Riders Name</th>
								<th class="column4">Item</th>
								<th class="column5">Quantity</th>
								<th class="column6">Status</th>
                                <th class="column7">Details</th>
							</tr>
						</thead>
						<tbody>

						<?php foreach($customers as $row) {?>
<!--  -->
<tr>

<td class="column2"> <?php echo $row['Seller_Name']; ?></td>
<td class="column3"> <?php echo $row['Rider_Name']; ?></td>
<td class="column4"><?php echo $row['item']; ?></td>
<td class="column5"> <?php echo $row['quantity']; ?></td>
<td class="column6"><?php echo $row['status']; ?></td>
<td class="column7"> <a href="updated.php?id=<?= $row['deliver_id'] ?>" > View Details</a> </td>

</tr>
<?php } ?>
						
<?php if(count($customers) == 0){ ?>
						<tr>
						<td class="column1" colspan="6">
							Your products will be shipped
						</td>
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

