<?php
session_start();
include 'connection.php';
$conn = getConnection();
if($_SESSION['first_name'] == ""){
    session_destroy();
      header('location:index.php');
}
if (isset($_GET['add'])) {
  $product_id = $_GET['add'];
  $query = "SELECT `product_name`, `quantity`, `price`, `description`, `image` FROM `PRODUCT` WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      $product_name = $row['product_name'];
      $description = $row['description'];
      $price = $row['price'];
      $product_quantity = $row['quantity'];
      $_SESSION['quantity'] = $quantity;
      $image = $row['image'];
    }
  }
}
if (isset($_POST['add_to_cart_btn'])) {
  $user_quantity = mysqli_real_escape_string($conn, $_POST['user_quantity']);
  if ($user_quantity <= $product_quantity) {
    $user_id = $_SESSION['user_id'];
    $total = ($price * $user_quantity) + 12.99;
    $product_left = $product_quantity - $user_quantity;
    $query = "SELECT * FROM `CART` WHERE product_id = '$product_id' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) >= 1) {
      // Item already in shopping cart
      echo "Item already in shopping cart";
    } else {
      // Insert item into the shopping cart
      $query1 = "INSERT INTO `CART`(`user_id`, `product_id`, `product_quantity`, `price`, `shipping`, `total`) VALUES ('$user_id', '$product_id', '$user_quantity', '$price', '12.99', $total)";
      mysqli_query($conn, $query1);
      $query2 = "UPDATE `PRODUCT` SET `quantity`= '$product_left' WHERE $product_id";
      mysqli_query($conn, $query2);

      echo "item successfully added to cart \n";
      echo "Your total is: $$total";
    }
  }
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="p-3 mb-2 bg-dark text-white">
    <div>
      <h1 class="text-info"><?php echo "$product_name"; ?></h1>
      <h2><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" height="300" width="300"/>'; ?></h2>
      <h4><?php echo "$description"; ?></h4>
      <h3 class="text-info">Price: <?php echo "$price" ?></h3>

      <form class="" action="" method="post">
        <input type="text" name="user_quantity" value="" placeholder="Qauntity">
        <button type="submit" name="add_to_cart_btn">Add</button>
      </form>
      <a href="index.php">Back to Shopping</a>
      <a href="cart.php">Shopping Cart</a>
    </div>
  </body>
</html>