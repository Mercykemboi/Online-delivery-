<?php
include 'connect.php';


//  $var="CREATE DATABASE Delivery";

//  if(mysqli_query($connection,$var)){

//      echo "database created successfully";
// }else{
//      echo " could not create ".mysqli_error($connection);
// }
// $table = "CREATE TABLE Seller(seller_id int  auto_increment,PRIMARY KEY(seller_id), Name varchar(100), Email varchar(100),  phoneNo varchar(100), password varchar(200),PostalA varchar(200),  reg_date timestamp default current_timestamp on update current_timestamp )";

//  if(mysqli_query($connection, $table)){

//     echo "Table created successfully";
//  }
//  else{
//      echo "Table not created ".mysqli_error($connection);
//  }
//  $table = "CREATE TABLE Customer(customer_id int  auto_increment,PRIMARY KEY(customer_id), Name varchar(100),  Email varchar(100),  phoneNo varchar(100), password varchar(200), PostalA varchar(200),  reg_date timestamp default current_timestamp on update current_timestamp )";

//  if(mysqli_query($connection, $table)){

//     echo "Table created successfully";
//  }
//  else{
//      echo "Table not created ".mysqli_error($connection);
//  }
//   $table = "CREATE TABLE Rider(Riders_id int auto_increment, rPRIMARY KEY (Riders_id), Name varchar(100), availability varchar(100),Email varchar(100),  phoneNo varchar(100), password varchar(200), PostalA varchar(200),  reg_date timestamp default current_timestamp on update current_timestamp)";
//   if(mysqli_query($connection, $table)){

//     echo "Table created successfully";
//  }
//   else{
//       echo "Table not created ".mysqli_error($connection);
//   }
$name=mysqli_escape_string($connection,$_POST["Name"]);


$mail=mysqli_escape_string($connection,$_POST["Email"]);
 //password hashing for encrypting the password
 $pass=password_hash(mysqli_escape_string($connection, $_POST["password"]),PASSWORD_BCRYPT);
 $phone=mysqli_escape_string($connection,$_POST["phoneNo"]);

$addr=mysqli_escape_string($connection,$_POST["PostalA"]);


$account_type = strtolower($_POST['account_type'] ?? null);

if($account_type == 'seller'){
$insertvalues="INSERT INTO Seller(Name, Email, password,  phoneNo, PostalA) VALUES ('$name','$mail', '$pass', '$phone','$addr')";

 if(mysqli_query($connection,$insertvalues)){
     echo "Inserted succesful";
     header('Location: loginSeller.php');
 }else{
     echo" Insertion error".mysqli_error($connection);
 }

}

if($account_type == 'customer'){
$insertvalues="INSERT INTO Customer(Name, Email, password,phoneNo, PostalA) VALUES ('$name','$mail', '$pass', '$phone','$addr')";
  if(mysqli_query($connection,$insertvalues)){
     echo "Inserted succesful";
     header('Location: loginCustomer.php');
  }else{
   echo" Insertion error".mysqli_error($connection);
  }
}

if($account_type == 'rider'){
 $insertvalues="INSERT INTO Rider(Name, Email, password,  phoneNo, PostalA) VALUES ('$name','$mail', '$pass','$phone','$addr')";

 if(mysqli_query($connection,$insertvalues)){
     echo "Inserted succesful";
     header('Location: rider.html');
 }else{
     echo" Insertion error".mysqli_error($connection);
 }
}
?>