<?php

session_start();
if(!isset($_SESSION['customer_id'])){
	header("location:loginCustomer.php");
	exit;
}
$set=$_GET['id'];

include 'connect.php';

$all="UPDATE deliver SET `status` = 'Delivered' WHERE deliver.deliver_id=$set";
// $all="INSERT INTO updates (`status`, `deliver_id`) VALUES('Delivered', $set, )";

$query = mysqli_query($connection, $all);

echo 'Updated';

header("location:updated.php?id=".$set);
