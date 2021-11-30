

<?php
session_start();
include 'connect.php';
// include 'deliver.php';
// include 'Login.php';


$id=$_GET['id'] ?? null; 

if($id == null){
    header("location: all.php");
    die();
}

$seller_id = $_SESSION['seller_id'] ?? null;
$fetch_delivery= "SELECT deliver.*, customer.Name as Customer_Name, rider.Name as Rider_Name
    FROM deliver INNER JOIN Customer ON customer.customer_id=deliver.customer_id INNER JOIN rider ON rider.Riders_id=deliver.Riders_id
    WHERE deliver_id =$id AND deliver.seller_id = $seller_id"; 
// $fetch_delivery= "SELECT * FROM Deliver";
$result = mysqli_query($connection, $fetch_delivery);
// echo $fetch_delivery;

$delivery = $result->fetch_array();
$deliver_id=$_GET['id'];

if($delivery == null){
    header("location: all.php");
    die();
}

// Updates
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
}

?>

  
        
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
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
	<link rel="stylesheet" type="text/css" href="style.css">
    
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
								<th class="column2">customer_id</th>
								<th class="column3">riders_id</th>
								<th class="column4">Item</th>
								<th class="column5">Quantity</th>
								<th class="column6">Status</th>
                               
							</tr>
						</thead>
					
                            

<tr>

<td class="column1"> <?php echo $delivery['deliver_id']; ?></td>
<td class="column2"> <?php echo $delivery['Customer_Name']; ?></td>
<td class="column3"> <?php echo $delivery['Rider_Name']; ?></td>
<td class="column4"><?php echo $delivery['item']; ?></td>
<td class="column5"> <?php echo $delivery['quantity']; ?></td>
<td class="column6"><?php echo $delivery['status']; ?></td>

</tr>



						</tbody>
					</table>
				</div>
			</div>
			<form  id="form" action="updates.php" method="POST">

<div class= "header">
	Updates Table
</div>


<input type="text" placeholder="Info status" name="status">

<input type="text"  placeholder="Additional information" name="item">

<input type="time"  placeholder="Updated time" name="time">

<input type="hidden"   name="deliver_id" value="<?php echo $deliver_id?>" >

<button type="submit"  name="update">Update</button>


</form>
</div>
			<div>

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

