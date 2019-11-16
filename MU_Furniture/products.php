

<?php
session_start();
require 'server.php';

if($_SESSION['first_name'] == ""){
    session_destroy();
      header('location:index.php');
}

function showSofas()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`,`quantity`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '1'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity = $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
      echo "<a href="."explore.php?add=".$row['product_id'].">Explore</a>";
    }
  }
  mysqli_close($conn);
}  

?>

<?php

function showBeds()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`,`quantity`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '2'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity = $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
       echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
      echo "<a href="."explore.php?add=".$row['product_id'].">Explore</a>";
    }
  }
  mysqli_close($conn);
}
?>

<?php
function showTables()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`,`price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '3'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
       $quantity = $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
      echo "<a href="."explore.php?add=".$row['product_id'].">Explore</a>";
    }
  }
  mysqli_close($conn);
}
?>

<?php
function showDrawers()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`,`price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '4'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity = $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
      echo "<a href="."explore.php?add=".$row['product_id'].">Explore</a>";
    }
  }
  mysqli_close($conn);
}
?>
<?php
function showChairs()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`,`price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '5'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity = $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
      echo "<a href="."explore.php?add=".$row['product_id'].">Explore</a>";
    }
  }
  mysqli_close($conn);
}
?>