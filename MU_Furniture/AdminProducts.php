<?php

session_start();
if ($_SESSION['first_name'] == "") {
  header('Location:login.php');
}?>

<!DOCTYPE html>

<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="text-warning">
<body class="p-3 mb-2 bg-dark text-white""p-3 mb-2 bg-warning text-dark"
<html lang="en" dir="ltr">
    <div class"adprod" align = "center">
  <head>
    <meta charset="utf-8">
    <title>MU Furniture</title>
  </head>
  <body>
    <?php if ($_SESSION['user_id']): ?>
      <h3>Welcome <strong><?php echo $_SESSION['first_name']; ?></strong> to MU Furniture</h3>
    <?php endif; ?>
     <p><a href="AdminSofa.php">Products</a>
  </body>
  </body>
  </div>
  </div>

<?php

require 'AdminServer.php';

if($_SESSION['first_name'] == ""){
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
      $quantity= $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo "<p>$description</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
      
    }
  }
  mysqli_close($conn);
}  
?>

<?php

function showBeds()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '2'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity= $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo "<p>$description</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
    }
  }
  mysqli_close($conn);
}
?>

<?php
function showTables()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '3'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity= $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo "<p>$description</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
    }
  }
  mysqli_close($conn);
}
?>

<?php
function showDrawers()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '4'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity= $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo "<p>$description</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
    }
  }
  mysqli_close($conn);
}
?>
<?php
function showChairs()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '5'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $quantity= $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$quantity</p>";
      echo "<p>$price</p>";
      echo "<p>$description</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
    }
  }
  mysqli_close($conn);
}
?>
</div>
</html>
