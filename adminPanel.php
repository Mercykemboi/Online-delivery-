
<?php
session_start();
include 'connect.php';

$seller="SELECT * FROM Seller ";

$all="SELECT * FROM deliver ";

$seller1= mysqli_query($connection,$seller);


$query = mysqli_query($connection, $all);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' type='text/css' media='screen' href='admin.css'>

    <script src='main.js'></script>
</head>
<body>
   <div class="container">
       <div class="navigation">

        <ul>
<li>
    <a href="">

      <span class="icons" ><img src="images/truck-solid.svg" width="45px" ></span>  
    <span class="title"><h2>Delivery</h2></span>
</a>
</li>
<li>
    <a href="">
   <span class="icons"><img src="images/home-solid.svg"  class="new-icon"></span> 

    <span class="title">Dashboard</span>
</a>
</li>
<li>
    <a href="rider.html">
     <img src="images/user-plus-solid.svg" alt="" class="new-icon">
    <span class="title"> Add Rider</span>
</a>
</li>
<li>
    <a href="allCustomers.php">
    <span class="icons"><img src="images/users-solid.svg" width="50px"   class="new-icon"></span>
    <span class="title">All Customers</span>
</a>
</li>
   <li>
       <a href="allSellers.php">
       <span class="icons"><img src="images/users-solid.svg" width="50px"  class="new-icon" ></span>
       <span class="title">All Sellers</span>
    </a>
   </li> 
   <li>
       <a href="allRiders.php">
       <span class="icons"><img src="images/users-solid.svg" width="50px"  class="new-icon" ></span>
       <span class="title">All Riders</span>
    </a>
   </li> 
   <!-- <li>
       <a href="">
    <span class="icons">  <i class="fa fa-comments" aria-hidden="true"></i>
    </span>
      <span class="title">Message</span>
    </a>
  </li>
   <li>
       <a href="">
  <span class="icons">  <i class="fa fa-info-circle" aria-hidden="true"></i></span>
    <span class="title">Help</span>
</a>
</li>  -->
 <!-- <li>


    <a href="settings.html">
  <span class="icons"><i class="fa fa-cog" aria-hidden="true"></i></span>  

    <span class="title">Settings</span>
</a>
</li>  -->

<li>
    
    <a href="logOut.php">
        <span class="icons"><img src="images/sign-out-alt-solid.svg" width="50px"  class="new-icon"></span>

    <span class="title">Log Out</span>
</a>
</li> 
</ul>
       </div>
        
<div class="main">
    <div class="topbar">
        <div class="toggle" onclick="toggleMenu();">
        <img src="images/iconmonstr-menu.svg" alt="menu" class="menu-icon">
        </div>
        <div class="services">
<!-- <label>
    <input type="text" placeholder="Search">
    <i class="fa fa-search" aria-hidden="true"></i>

</label> -->
Online Delivery Services
</div>
<div class="user">
    <img src="images/bike1.jpg" width="100px">
</div>
       
    </div>
<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers">
                
            <?php
                $count = "SELECT COUNT(*) FROM customer";
                $num = mysqli_query($connection,$count);
                $row = mysqli_fetch_array($num);

                if($num){
                    echo $row[0];
                }
                else{
                    echo "error".mysqli_error($connection);
                }
            ?>
            </div>
            <div class="cardName">Customers</div>
        </div>
        <div class="icon-box">
        <img src="images/users-solid.svg" width="50px">
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers">
            <?php
                $count = "SELECT COUNT(*) FROM seller";
                $num = mysqli_query($connection,$count);
                $row = mysqli_fetch_array($num);

                if($num){
                    echo $row[0];
                }
                else{
                    echo "error".mysqli_error($connection);
                }
            ?>
            </div>
            <div class="cardName">Sellers</div>
        </div>
        <div class="icon-box">
        <img src="images/users-solid.svg" width="50px">
        </div>
 
    </div>
    <div class="card">
        <div>
            <div class="numbers">
            <?php
                $count = "SELECT COUNT(*) FROM rider";
                $num = mysqli_query($connection,$count);
                $row = mysqli_fetch_array($num);

                if($num){
                    echo $row[0];
                }
                else{
                    echo "error".mysqli_error($connection);
                }
            ?>
            </div>
            <div class="cardName">Riders</div>
        </div>
        <div class="icon-box">
        <img src="images/users-solid.svg" width="50px">
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers">
            <?php
                $count = "SELECT COUNT(*) FROM deliver";
                $num = mysqli_query($connection,$count);
                $row = mysqli_fetch_array($num);

                if($num){
                    echo $row[0];
                }
                else{
                    echo "error".mysqli_error($connection);
                }
            ?>
            </div>
            <div class="cardName">Deliveries</div>
        </div>
    </div>
   
</div>

<div class="details">
<div class ="recentDeliver">
<div class="cardHeader">
    <h2>Recent Deliveries</h2>
    <!-- <a href="" class="btn">view all </a> -->
</div>
<table>
<thead>
<tr>
<td >deliver_id</td>

      <td >sellers_id</td>
      <td >Customers_id</td>
      <td >Rider_id</td>
      <td >Item</td>
      <td >Quantity</td>
      <td >Status</td>
</tr>
</thead>
<tbody>
<?php while ($row=mysqli_fetch_array($query)) {?>
  
  <tr>
  <td > <?php echo $row['deliver_id']; ?></td> 
  <td ><?php echo $row['seller_id']; ?></td>
  <td ><?php echo $row['customer_id']; ?></td>
  <td ><?php echo $row['Riders_id']; ?></td>
  <td ><?php echo $row['item']; ?></td>
  <td ><?php echo $row['quantity']; ?></td>
  <td  class="status"><?php echo $row['status']; ?></td>
  </tr>
  <?php } ?>
  </tr>
</tbody>

</tbody>
</table>
</div>
<div class ="recentSeller">
<div class="cardHeader">
    <h2>Recent Seller</h2>
</div>
<table>
<thead>
<tr>

      <td >sellers Id</td>
      <td >sellersName</td>
  
</tr>
</thead>
<tbody>
<?php while ($row=mysqli_fetch_array($seller1)) {?>
  
  <tr>
  <td > <?php echo $row['seller_id']; ?></td> 
  <td ><?php echo $row['Name']; ?></td>

  </tr>
  <?php } ?>
  </tr>
</tbody>

</tbody>
</table>
</div>
</div>


</div>


   </div> 



   
   <script>
       function toggleMenu(){
           let toggle =  document.querySelector('.toggle');
           let naviagtion = document.querySelector('.navigation');
           let main = document.querySelector('.main');
           toggle.classList.toggle('active');
           naviagtion.classList.toggle('active');
           main.classList.toggle('active');
       }
   </script>
</body>
</html>