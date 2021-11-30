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
	
			 <label >Email</label>
	 		<input type="text" placeholder="Type your Email" name="Email"  required>
			 <label >Password</label>
             <input type="password"  placeholder="Type your Password" name="password"  required>
	 		
	 		<button type="submit"  name="submit">Login</button>

	
	 	</form>
	
		<script src=Form.js></script>
	
	 </body>
 </html>
 <?php
 include 'connect.php';
 if(isset($_POST['submit'])){
            //declare the username      
          
$mail= mysqli_escape_string($connection,$_POST['Email']);
$pass=mysqli_escape_string($connection,$_POST['password']);
// $hashed=password_hash($password23,PASSWORD_BCRYPT);


$verify="SELECT Email, password FROM Admin WHERE Email= '$mail'";
$received=mysqli_query($connection,$verify);
// echo $fetched['password'];
$row = mysqli_num_rows($received);
$fetched=mysqli_fetch_assoc($received);
if($row>0){

        if(password_verify($pass,$fetched['password'])){
     
            session_start();
            $_SESSION['Email'] = $mail;
			
            echo "Login succesfully";
			header('Location: adminPanel.php');
            // break;
        }
        else{
            echo "<script> alert (invalid login details) </script>";
            
            // break;
        }

    }

        }
		?>