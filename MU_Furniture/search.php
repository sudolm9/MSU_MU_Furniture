<?php
session_start();
include 'connection.php';
$conn = getConnection();
$user_id = $_SESSION['user_id'];
if ($_SESSION['first_name'] == "") {
  header('location:index.php');
}?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to MU</title>
  </head>
  <body>
      <div class="navbar">
      <nav>
        <a href="sofa.php">Sofas</a>
        <a href="chair.php">Chairs</a>
        <a href="table.php">Tables</a>
        <a href="dresser.php">Dressers</a>
        <a href="bed.php">Beds</a>
        <a href="cart.php">Cart</a>
        <a href="order.php">Orders</a>
      </nav>
    </div>
    <form class="" action="search.php" method="post">
        <input type="search" name="search" value="" placeholder="Product to Search...">
        <input type="submit" name="search_btn" value="Search" placeholder="">
      </form>

<?php
if (isset($_POST['search_btn'])) {
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $query16 = "SELECT * FROM `PRODUCT` WHERE product_name LIKE '%$search%'";
  $result16 = mysqli_query($conn, $query16);
  if (mysqli_num_rows($result16) == 0) {
    echo "No product like that";
  } else {
    while ($row = mysqli_fetch_assoc($result16)) {
      $product_id = $row['product_id'];
      $description = $row['description'];
      $product_name = $row['product_name'];
      $price = number_format($row['price'], 2);
      $image = $row['image'];
      echo "<p>$product_name</p>";
      echo "<p>$price</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" heigh="100" width="100"/>';
      echo "<a href="."explore.php?add=".$row['product_id'].">Explore</a>";
    }
  }
}
 ?>