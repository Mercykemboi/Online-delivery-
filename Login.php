<?php
include 'connect.php';

session_start();

$mail= mysqli_escape_string($connection,$_POST['Email']);
$pass=mysqli_escape_string($connection,$_POST['password']);
// $hashed=password_hash($password23,PASSWORD_BCRYPT);


$verify="SELECT Email, password FROM Customer WHERE Email= '$mail'";
$received=mysqli_query($connection,$verify);
// echo $fetched['password'];
$row = mysqli_num_rows($received);
$fetched=mysqli_fetch_assoc($received);
if($row>0){

        if(password_verify($pass,$fetched['password'])){
     
            // session_start();
            // $_SESSION['clearance'] = $username;
            echo "Login succesfully";
            // break;
        }
        else{
            echo "Invalid login details";
            
            // break;
        }

    }



?>





