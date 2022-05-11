<?php
session_start();
if(!isset($_SESSION['customer_id'])){
	header("location:loginCustomer.php");
	exit;
}
$set=$_GET['id'];

include 'connect.php';

$r = $connection->query("SELECT * FROM `deliver` WHERE `deliver_id` = $set");
$delivery = $r->fetch_array();

$all="SELECT * FROM updates WHERE deliver_id=$set ";


$query = mysqli_query($connection, $all);

$updates = [];

while ($row=mysqli_fetch_array($query)){
	array_push($updates, $row);
}
// echo $select;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Deliveries</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
                            
						<?php foreach($updates as $row) {?>
						<tr>


						<td class="column1"> <?php echo $row['InfoStatus']; ?></td> 
						<td class="column2"> <?php echo $row['additionalItem']; ?></td>
						<td class="column3"><?php echo $row['Time']; ?></td>
						</tr>
						<?php } ?>

						
						<?php if(count($updates) == 0){ ?>
						<tr>
						<td class="column1" colspan="3">
							No update has been made
						</td>
						</tr>
						<?php } ?>

						</tbody>
					</table>
					<!-- <label >Delivery</label> -->
          <!-- <input type="text"  placeholder="State if it has been delivered" name="state" class="delivery"  required> -->
		  
			<?php if(strtolower($delivery['status']) == 'delivered'){ ?>
				<script type='text/javascript'>alert('Item has been delivered')  </script>;
				<?php }else{ ?>
				<a href="mark_as_delivered.php?id=<?= $set ?>" >Mark item as delivered</a>
				<?php } ?>

				</div>
			</div>
		</div>
	</div>


	



</body>
</html>

