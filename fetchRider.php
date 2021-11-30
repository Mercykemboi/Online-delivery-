<?php
include 'connect.php';
// include 'fetch1.php';
// include 'deliver.php';
// include 'Login.php';


if(isset($_POST['submit'])){
    $id=$_POST['Riders_id']; 
    $fetch_rider= "SELECT * FROM 'Rider' WHERE NOT EXIST (SELECT * Deliver WHERE Deliver.status='pending' AND Deliver.deliver_id = Rider.Riders_id ='$id'"; 

}
$fetch_rider= "SELECT * FROM Rider";
$result = mysqli_query($connection, $fetch_rider);


?>
<!DOCTYPE html>
 <head>
 	<meta name= "viewport" content= "width=device-width,initial-scale=1">
	 <title></title>
	 <meta charset="UTF-8"/>
	 <link rel="stylesheet" href="style.css">
 </head>
	 <body>	 
         <form action ="deliver.php" method="POST">
         Select a Rider
<select name="Riders_id"  required>
<?php
while($row = mysqli_fetch_array($result)){
    ?>
    <option value="<?php echo $row['Riders_id']?>"><?php echo $row['fName']?></option>
    <?php
}
?>
</select>
<input type="text" name="status" value="pending">
<button type="submit"  name="submit" class="submit">Submit</button>
</form>
</body>
 </html>
 