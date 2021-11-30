<?php session_start(); 
// if(!isset($_SESSION['seller_id'])){
// 	header("location:loginSeller.php");
// 	exit;
// }

?>
<?php
    
	include 'connect.php';
	if(isset($_POST['submit'])){
			    
	$mail= mysqli_escape_string($connection,$_POST['Email']);
   $pass=mysqli_escape_string($connection,$_POST['password']);
   // $hashed=password_hash($password23,PASSWORD_BCRYPT);
   
   
   $verify="SELECT * FROM Seller WHERE Email= '$mail'";
   $received=mysqli_query($connection,$verify);
   // echo $fetched['password'];
   $row = mysqli_num_rows($received);
   $fetched=mysqli_fetch_assoc($received);
   if($row>0){
   
		   if(password_verify($pass,$fetched['password'])){
		
		
			   $_SESSION['seller_id'] = $fetched['seller_id'];
			   echo "Login succesfully";
			   header('Location: fetch.php');
			   // break;
		   }
		   else{
			   echo "Invalid login details";
			   
			   // break;
		   }
   
	   }
   
		   }
		   ?>

<!DOCTYPE html>
 <head>
 	<meta name= "viewport" content= "width=device-width,initial-scale=1">
	 <title>Login</title>
	 <meta charset="UTF-8"/>
	 <link rel="stylesheet" href="style.css">
 </head>
	 <body>
	 
	 	<form  id="form" action="" method="POST">
	 		<div class= "header">
	 			Login
	 		</div>
	
			 <label >Email</label>
	 		<input type="text" placeholder="Type your Email" name="Email"  required> 
			 <label >Password</label>
             <input type="text"  placeholder="Type your password" name="password"  required>
	 		
	 		<button type="submit"  name="submit">Login</button>

	
	 	</form>
	
		<script src=Form.js></script>
	
	 </body>
 </html>
