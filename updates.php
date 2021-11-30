
<?php
// include 'deliver.php';
include 'connect.php';
// $select="SELECT * FROM Deliver";
// $query=mysqli_query($connection,$select);
// $table = "CREATE TABLE Updates(id int auto_increment, deliver_id int,  InfoStatus varchar(100), additionalItem varchar(100), Time varchar(100),reg_date timestamp default current_timestamp on update current_timestamp ,PRIMARY KEY(id),FOREIGN KEY(deliver_id) REFERENCES Deliver(deliver_id)) ";
// if(mysqli_query($connection, $table)){

//      echo "Table created successfully";
//   }  else{
//       echo "Table not created ".mysqli_error($connection);
//  select



$status=mysqli_escape_string($connection,$_POST["status"]);

 $item=mysqli_escape_string($connection,$_POST["item"]);
$time=mysqli_escape_string($connection,$_POST["time"]);
$deliver=mysqli_escape_string($connection,$_POST["deliver_id"]);

if(isset($_POST['update'])){
    $deliver_id=$_POST['deliver_id'];
  $status=$_POST['status'];
  $item=$_POST['item'];
  $time=$_POST['time'];


  //create a query that updates the details that belong to that particular user
  $update="UPDATE deliver SET status='$status' WHERE deliver_id = $deliver_id ";
  //run the query
  //check if the update is succeessful
  if( mysqli_query($connection,$update)){
      echo 'Update successfully';
  }else{
      echo ("update unsuccessful").mysqli_error($connection);
  }


$insert="INSERT INTO updates (InfoStatus,additionalItem,Time,deliver_id) VALUES ('$status', '$item', '$time', $deliver_id)";
if(mysqli_query($connection,$insert)){
     echo "Inserted succesful";
     header('location:details.php');
 
  }else{
   echo" Insertion error".mysqli_error($connection);
  }


 
}

?>