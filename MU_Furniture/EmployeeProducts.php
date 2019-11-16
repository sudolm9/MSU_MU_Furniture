<?php
require 'connection.php';
$conn = getConnection();
?>

<!DOCTYPE html>
<html class="p-3 mb-2 bg-dark text-white">
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<h1 class="p-3 mb-2 bg-dark text-white" align = "center">MU Furniture Employee portal </h1>
<p class="p-3 mb-2 bg-success text-white" align = "center">List of Products</p>

  <body class="p-3 mb-2 p-3 mb-2 bg-dark text-white">
            <nav class ="navbar navbar-expand-lg navbar-light" >
    <a class="navbar-brand text-light">Categories:</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active text-success" href="sofa.php">Sofa's</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-success" href="chair.php">Chair's</a>
        <li>
        <a class="nav-link active text-success" href="table.php">Table's</a>
      </li>
      <li>
        <a class="nav-link active text-success" href="drawer.php">Drawer's</a>
      <li>
        <a class="nav-link active text-success " href="bed.php">Bed's</a>
      </li>
      <li>
          <a class="nav-link active text-success" href="cart.php">Cart</a>
      </li>
      <li>
          <a class="nav-link active text-success" href="Employee.php">Back</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a button class="btn btn-outline-success my-2 my-sm-0" type="submit" href="login.php">Logout</button></a>
      </form>
  </div>
  </nav>
    </div>
    <?php if ($_SESSION['user_id']): ?>
    <form class="p-3 mb-2 bg-success text-white" action="search.php" method="post">
        <input type="search" name="search" value="" placeholder="Product to Search...">
        <input type="submit" name="search_btn" value="Search" placeholder="">
      </form>
      <h3>Welcome <strong><?php echo $_SESSION['first_name']; ?></strong> to MU Furniture</h3>
    <?php endif; ?>
  </body>
</html>
</html>

<?php


function showSofas()
{
  $conn = getConnection();
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `quantity`,`price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '1'";
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
      $quantity= $row['quantity'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
       echo "<p>$quantity</p>";
      echo "<p>$price</p>";
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
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '3'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$price</p>";
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
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '4'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$price</p>";
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
  $sql = "SELECT `product_id`, `product_type`, `product_name`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_type = '5'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Nothing to show";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $image = $row['image'];
      $price = number_format($row['price'], 2);
      echo "<p>$product_name</p>";
      echo "<p>$price</p>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="100" width="100"/>';
     
    }
  }
  mysqli_close($conn);
}
?>