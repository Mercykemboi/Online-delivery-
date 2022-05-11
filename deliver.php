<?php
session_start();
if(!isset($_SESSION['seller_id'])){
	header("location:loginSeller.php");
	exit;
}

// include 'register.php';

include 'connect.php';
// $table = "CREATE TABLE Deliver(deliver_id int auto_increment, seller_id int ,customer_id int , Riders_id int,item varchar(200), quantity varchar(50), status varchar(100) DEFAULT 'Pending',reg_date timestamp default current_timestamp on update current_timestamp ,PRIMARY KEY(deliver_id),FOREIGN KEY(deliver.Riders_id) REFERENCES Riders_id(deliver.Riders_id), FOREIGN KEY(customer_id) REFERENCES Customer(customer_id),FOREIGN KEY(seller_id) REFERENCES Seller(seller_id), FOREIGN KEY(Riders_id) REFERENCES Riders(Riders_id)) ";
//   if(mysqli_query($connection, $table)){

//      echo "Table created successfully";
//   }  else{
//       echo "Table not created ".mysqli_error($connection);
//  }


// $item=mysqli_escape_string($connection,$_POST["item"]);

//  $quantity=mysqli_escape_string($connection,$_POST["quantity"]);
//  $customer=mysqli_escape_string($connection,$_POST["customer_id"]);
//  $rider=mysqli_escape_string($connection,$_POST["Riders_id"]);

// $insertvalues="INSERT INTO Deliver(item, quantity,customer_id) VALUES ('$item','$quantity','$customer')";
//   if(mysqli_query($connection,$insertvalues)){
//      echo "Inserted succesful";
 
//   }else{
//    echo" Insertion error".mysqli_error($connection);
//   }
//   $insertvalues="INSERT INTO Deliver(Riders_id) VALUES ('$rider')";
//   if(mysqli_query($connection,$insertvalues)){
//      echo "Inserted succesful";
 
//   }else{
//    echo" Insertion error".mysqli_error($connection);
//   }
if(isset($_POST['submit'])){
   $phone=$_POST['phoneNo']; 
 $customer1=getCustomer($phone);
//  $rider=$_POST['Riders_id'];
$rider=fetchRider();
// var_dump(fetchRider());

// if($status="delivered"){
//    $update= "UPDATE deliver SET $status='pending' WHERE Riders_id= $rider_id ";
// }
if($rider!== null){
   echo "rider is available";

  

 if($customer1!== null){
    echo "the Phoneno is recorded ";
$customer=$customer1['customer_id'];
$item=mysqli_escape_string($connection,$_POST["item"]);

 $quantity=mysqli_escape_string($connection,$_POST["quantity"]);
//  $rider=$_POST["Riders_id"];
//  $rider=$rider1['Riders_id'];
$rider_id=$rider['Riders_id'];
 $seller_id = $_SESSION["seller_id"];

$insertvalues="INSERT INTO Deliver(item, quantity,customer_id, Riders_id, seller_id) VALUES ('$item',$quantity, $customer, $rider_id, $seller_id)";
// echo $insertvalues;
  if(mysqli_query($connection,$insertvalues)){
     echo "Inserted succesful";
     header('Location: all.php');
 
  }else{
   echo" Insertion error".mysqli_error($connection);
  }
}else{
   echo "<script type='text/javascript'>alert('Phone nuumber is not recorded')</script>";
}
}else{
   echo "<script type='text/javascript'>alert('Rider is not available')</script>";
}
}
  function getCustomer($phone){
     global $connection;
   $fetch_customers= "SELECT * FROM Customer WHERE phoneNo='$phone'"; 
   // echo $fetch_customers;
   $result = mysqli_query($connection, $fetch_customers);
    
   return mysqli_fetch_assoc($result);
  }
  function fetchRider(){
     global $connection;
     $fetch="SELECT * FROM Rider WHERE NOT EXISTS(SELECT * FROM deliver WHERE deliver.status='pending' AND deliver.Riders_id=Rider.Riders_id)";
$fetchride = mysqli_query($connection, $fetch);

     return mysqli_fetch_assoc($fetchride);
  
  }
?>