<?php
include "connect.php";


// $table1 = "CREATE TABLE Admin(admin_id int  auto_increment, PRIMARY KEY(admin_id), Name varchar(100),  Email varchar(100), password varchar(200), reg_date timestamp default current_timestamp on update current_timestamp )";

//  if(mysqli_query($connection, $table1)){

//     echo "Table created successfully";
//  }
//  else{
//      echo "Table not created ".mysqli_error($connection);
//  }




 $name=mysqli_escape_string($connection,$_POST["Name"]);
$mail=mysqli_escape_string($connection,$_POST["Email"]);
 //password hashing for encrypting the password
 $pass=password_hash(mysqli_escape_string($connection, $_POST["password"]),PASSWORD_BCRYPT);

$insertvalues="INSERT INTO Admin(Name, Email, password) VALUES ('$name','$mail', '$pass')";

 if(mysqli_query($connection,$insertvalues)){
     echo "Inserted succesful";
     header('Location: add.php');
 }else{
     echo" Insertion error".mysqli_error($connection);
 }




?>