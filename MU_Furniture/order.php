<?php
session_start();
include 'connection.php';
$conn = getConnection();
$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
if($_SESSION['first_name'] == ""){
      header('location:index.php');
 }

 $query = "SELECT * FROM `ORDERS` WHERE ORDERS.user_id = '$user_id' ORDER BY date DESC";
 $result = mysqli_query($conn, $query);
 $order_number = mysqli_num_rows($result); ?>
 
 
 <!DOCTYPE html>
 <link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to MU</title>
  </head>
  <body class="p-3 mb-2 p-3 mb-2 bg-dark text-white">
      <div class="navbar">
<nav class ="navbar navbar-expand-lg navbar-light" >
    <a class="navbar-brand text-light">Categories:</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active text-info" href="sofa.php">Sofa's</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-info" href="chair.php">Chair's</a>
        <li>
        <a class="nav-link active text-info" href="table.php">Table's</a>
      </li>
      <li>
        <a class="nav-link active text-info" href="drawer.php">Drawer's</a>
      <li>
        <a class="nav-link active text-info" href="bed.php">Bed's</a>
      </li>
      <li>
          <a class="nav-link active text-info" href="cart.php">Cart</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a button class="btn btn-outline-success my-2 my-sm-0" type="submit" href="login.php">Logout</button></a>
      </form>
  </div>
  </nav>
    </div>
    <form class="p-3 mb-2 bg-info text-white" action="search.php" method="post">
        <input type="search" name="search" value="" placeholder="Product to Search...">
        <input type="submit" name="search_btn" value="Search" placeholder="">
      </form>
 <?php
 if(mysqli_num_rows($result) == 0) {
     echo"<h1>Nothing in your orders, place items in your cart to place an order</h1>";
 } else { ?>
   <table>
       <caption><?php echo $first_name ?>'s Orders</caption>
     <thead>
       <th>Product Name</th>
       <th>Quantity</th>
       <th>Total</th>
       <th>Date</th>
     </thead> <?php
     while ($row = mysqli_fetch_assoc($result)) {
       $product_name = $row['product_name'];
       $quantity = $row['quantity'];
       $total = $row['total'];
       $date = $row['date'];?>
       <tr>
         <td><?php echo "$product_name"; ?></td>
         <td><?php echo "$quantity"; ?></td>
         <td><?php echo "$total";?></td>
         <td><?php echo "$date"; ?></td>
       </tr>
       <?php
     }
    ?>
   </table>
   <?php
 }

?>