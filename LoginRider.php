<!DOCTYPE html>
 <head>
 	<meta name= "viewport" content= "width=device-width,initial-scale=1">
	 <title>Form Sign Up</title>
	 <meta charset="UTF-8"/>
	 <link rel="stylesheet" href="style.css">
 </head>
	 <body>
	 
	 	<form  id="form" action="" method="POST">
	 		<div class= "header">
	 			Login
	 		</div>
	
	 		
	 		<input type="text" placeholder="Email" name="Email"  required>

             <input type="text"  placeholder="Password" name="password"  required>
	 		
	 		<button type="submit"  name="submit">Login</button>

	
	 	</form>
	
		<script src=Form.js></script>
	
	 </body>
 </html>
 <?php
 session_start();
 include 'connect.php';
 if(isset($_POST['submit'])){
            //declare the username      
          
$mail= mysqli_escape_string($connection,$_POST['Email']);
$pass=mysqli_escape_string($connection,$_POST['password']);
// $hashed=password_hash($password23,PASSWORD_BCRYPT);


$verify="SELECT Email, password FROM Rider WHERE Email= '$mail'";
$received=mysqli_query($connection,$verify);
// echo $fetched['password'];
$row = mysqli_num_rows($received);
$fetched=mysqli_fetch_assoc($received);
if($row>0){

        if(password_verify($pass,$fetched['password'])){
     
            // session_start();
            // $_SESSION['clearance'] = $username;
			$_SESSION['Riders_id']=$fetched['Riders_id']
            echo "Login succesfully";
            // break;
        }
        else{
			echo "<script type='text/javascript'>alert('Rider is not available')</script>";
            
            // break;
        }

    }

        }
		?>