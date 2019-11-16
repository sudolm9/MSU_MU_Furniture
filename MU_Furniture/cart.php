<?php
session_start();
include 'connection.php';
$conn = getConnection();
$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
if($_SESSION['first_name'] == ""){
      header('location:index.php');
 }
 $query = "SELECT * FROM `PRODUCT` INNER JOIN `CART` ON CART.product_id = PRODUCT.product_id WHERE user_id ='$user_id'";
 $result = mysqli_query($conn, $query);

if (isset($_GET['add'])) {
  $product_to_add = $_GET['add'];

  //check to see if we have sufficent quantity to add
  $query2 = "SELECT quantity FROM `PRODUCT` WHERE product_id='$product_to_add'";
  $result2 = mysqli_query($conn, $query2);
  if (mysqli_num_rows($result2)) {
    while ($row = mysqli_fetch_assoc($result2)) {
      $available_quantity = $row['quantity'];
    }
  }

  //get current data from the cart to update it
  $query3 = "SELECT product_quantity, price, total FROM `CART` WHERE user_id = '$user_id' AND product_id = '$product_to_add'";
  $result3 = mysqli_query($conn, $query3);
  if (mysqli_num_rows($result3)) {
    while ($row = mysqli_fetch_assoc($result3)) {
      $current_quantity = $row['product_quantity'];
      $current_total = $row['total'];
      $price = $row['price'];
      $new_quantity = $current_quantity + 1;
      $new_total = $current_total + $price;
      $new_available_quantity = $available_quantity - 1;
    }
  }

  //if enough quantity to add to cart
  if ($new_available_quantity > 1) {
    //update the cart
    $query4 = "UPDATE `CART` SET product_quantity = '$new_quantity', total = '$new_total' WHERE product_id = '$product_to_add' AND user_id = '$user_id'";
    $result4 = mysqli_query($conn, $query4);

    //update the product table quantity
    $query5 = "UPDATE `PRODUCT` SET quantity = '$new_available_quantity' WHERE product_id = '$product_to_add'";
    mysqli_query($conn, $query5);
  } else {
    echo "<h1>Sorry, no more in stock</h1>";
  }
  header('location:cart.php');
}

if (isset($_GET['subtract'])) {
  $product_to_subtract = $_GET['subtract'];

  //check to see if we have sufficent quantity to add
  $query6 = "SELECT quantity FROM `PRODUCT` WHERE product_id='$product_to_subtract'";
  $result6 = mysqli_query($conn, $query6);
  if (mysqli_num_rows($result6)) {
    while ($row = mysqli_fetch_assoc($result6)) {
      $available_quantity = $row['quantity'];
    }
  }

  //get current data from the cart to update it
  $query7 = "SELECT product_quantity, price, total FROM `CART` WHERE user_id = '$user_id' AND product_id = '$product_to_subtract'";
  $result7 = mysqli_query($conn, $query7);
  if (mysqli_num_rows($result7)) {
    while ($row = mysqli_fetch_assoc($result7)) {
      $current_quantity = $row['product_quantity'];
      $current_total = $row['total'];
      $price = $row['price'];
      $new_quantity = $current_quantity - 1;
      $new_total = $current_total - $price;
      $new_available_quantity = $available_quantity + 1;
    }
  }
  if ($new_quantity > 0) {
    $query8 = "UPDATE `CART` SET product_quantity = '$new_quantity', total = '$new_total' WHERE product_id = '$product_to_subtract' AND user_id = '$user_id'";
    $result8 = mysqli_query($conn, $query8);

    $query9 = "UPDATE `PRODUCT` SET quantity = '$new_available_quantity' WHERE product_id = '$product_to_subtract'";
    $result9 = mysqli_query($conn, $query9);
  } else {
    $query10 = "DELETE FROM `CART` WHERE user_id = '$user_id' AND product_id = $product_to_subtract";
    $result10 = mysqli_query($conn, $query10);
  }
  header('location:cart.php');
}
if (isset($_GET['delete'])) {
  $product_to_delete = $_GET['delete'];
  $query11 = "SELECT quantity FROM `PRODUCT` WHERE product_id = '$product_to_delete'";
  $result11 = mysqli_query($conn, $query11);
  if (mysqli_num_rows($result11)) {
    while ($row = mysqli_fetch_assoc($result11)) {
      $available_quantity = $row['quantity'];
    }
  }

  $query12 = "SELECT product_quantity, price, total, shipping FROM `CART` WHERE user_id = '$user_id' AND product_id = $product_to_delete";
  $result12 = mysqli_query($conn, $query12);
  if (mysqli_num_rows($result12)) {
    while ($row = mysqli_fetch_assoc($result12)) {
      $current_quantity = $row['product_quantity'];
      $current_total = $row['total'];
      $price = $row['price'];
      $shipping = $row['shipping'];
      $new_total = $current_total - ($price * $current_quantity) - $shipping;
      $new_available_quantity = $available_quantity + $current_quantity;
    }
  }

  if ($current_quantity >= 1) {
    $query13 = "DELETE FROM `CART` WHERE product_id = '$product_to_delete' AND user_id = '$user_id'";
    $result13 = mysqli_query($conn, $query13);

    $query14 = "UPDATE `PRODUCT` SET quantity = '$new_available_quantity' WHERE product_id = '$product_to_delete'";
    $result14 = mysqli_query($conn, $query14);
    header('location:cart.php');
  }
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
      <li>
          <a class="nav-link active text-info" href="order.php">Orders</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a button class="btn btn-outline-success my-2 my-sm-0" type="submit" href="login.php">Logout</button></a>
      </form>
  </div>
  </nav>
    </div> <?php if ($_SESSION['user_id']) { ?>
    <form class="p-3 mb-2 bg-info text-white" action="search.php" method="post">
        <input type="search" name="search" value="" placeholder="Product to Search...">
        <input type="submit" name="search_btn" value="Search" placeholder="">
      </form>
        <h3>Welcome <strong><?php echo $_SESSION['first_name']; ?></strong> to MU Furniture</h3>
        <h4><?php echo $_SESSION['first_name']; ?>'s Shopping Cart</h4>
    <?php }?>
    <table class="p-3 mb-2 bg-info text-white" border="1">
      <thead>
        <th>Product Name</th>
        <th>Price</th>
        <th>Shipping</th>
        <th>Quantity</th>
        <th>Total</th>
        <th></th>
        <th></th>
        <th></th>
      </thead> <?php
      if (mysqli_num_rows($result) == 0) {
        echo "Nothing in your cart";
      } else {
        $sub_total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $product_id = $row['product_id'];
          $price = $row['price'];
          $shipping = $row['shipping'];
          $product_quantity = $row['product_quantity'];
          $total = $row['total'];
          $product_name = $row['product_name'];?>
          <tr>
            <td><?php echo "$product_name"; ?></td>
            <td><?php echo "$price"; ?></td>
            <td><?php echo "$shipping"; ?></td>
            <td><?php echo "$product_quantity"; ?></td>
            <td><?php echo "$total"; $sub_total+= $total;?></td>
            <td><a href="cart.php?add=<?php echo "$product_id"; ?>"> + </a></td>
            <td><a href="cart.php?subtract=<?php echo "$product_id"; ?>"> - </a></td>
            <td><a href="cart.php?delete=<?php echo "$product_id"; ?>">Delete</a></td>
          </tr>
          <?php
        }
        ?>
        <tr>
            <td>Sub Total:</td>
            <td></td>
            <td></td>
            <td></td>
            <td name="sub_total"><?php echo "$sub_total"; ?></td>
        </tr>
        <?php
      }
      ?>
    </table>
    <form class="" action="checkout.php" method="post">
      <input type="submit" name="checkout_btn" value="Check Out">
      <input type="hidden" name="sub_total" value="<?php echo"$sub_total" ?>">
    </form>
  </body>
</html>