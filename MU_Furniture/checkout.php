<?php
session_start();
include 'connection.php';
$conn = getConnection();
$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$sub_total = $_POST['sub_total'];


 if (isset($_POST['checkout_btn'])) {
   $query = "SELECT * FROM `PRODUCT` INNER JOIN `CART` ON CART.product_id = PRODUCT.product_id WHERE user_id ='$user_id'";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 0) {
     echo "Nothing in your cart";
     header("location:cart.php");
   } else {
     while ($row = mysqli_fetch_assoc($result)) {
       $product_id = $row['product_id'];
       $price = $row['price'];
       $shipping = $row['shipping'];
       $product_quantity = $row['product_quantity'];
       $total = $row['total'];
       $product_name = $row['product_name'];
       $date = date('Y-m-d H:i:s');

       $query2 = "INSERT INTO `ORDERS`(`user_id`, `product_id`, `product_name`, `quantity`, `total`, `date`) VALUES ('$user_id', '$product_id', '$product_name', '$product_quantity', '$total', '$date')";
       $result2 = mysqli_query($conn, $query2);
       $query3 = "DELETE FROM `CART` WHERE user_id = $user_id AND product_id = $product_id";
       $result3 = mysqli_query($conn, $query3);
     }
     echo"<h1>Your order has been checked out and your sub total is $sub_total</h1>";
     
   }
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>