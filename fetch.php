<?php
session_start();
// var_dump($_SESSION);
include 'connect.php';
// include 'deliver.php';
// include 'Login.php';

// $fetch_rider= "SELECT * FROM Rider";
// $result1 = mysqli_query($connection, $fetch_rider);




?>
<!DOCTYPE html>
 <head>
 	<meta name= "viewport" content= "width=device-width,initial-scale=1">
	 <title></title>
	 <meta charset="UTF-8"/>
	 <link rel="stylesheet" href="style.css">
 </head>
	 <body>	
   

 
         <form action='deliver.php' method="POST">
         <div class= "header">
	 		<b>	Send the Products Ordered by the Customer</b>
	 		</div>
<!-- <select name="customer_id"  required> -->

<input type="text" name="phoneNo" placeholder="Search the Customer using the phoneNo" required/>
  <!-- <input type="submit" name="search" value="Search"/><br> -->


<input type="text" placeholder="Enter the item" name="item"  required >
<input type="number" placeholder="Quantity" name="quantity" required >
<!-- 
<p style="color:white">Select a Rider<p>
<select name="Riders_id"  required>

</select> -->
<button style="margin-top:50px"type="submit"  name="submit" class="submit">Submit</button>
</form>
</body>
 </html>
 