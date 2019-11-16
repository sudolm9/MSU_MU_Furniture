<?php
session_start();
require 'products.php';

?>

<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to MU</title>
  </head>
    <body class="p-3 mb-2 p-3 mb-2 bg-dark text-white">
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
    </div>
    <?php if ($_SESSION['user_id']): ?>
    <form class="p-3 mb-2 bg-info text-white" action="search.php" method="post">
        <input type="search" name="search" value="" placeholder="Product to Search...">
        <input type="submit" name="search_btn" value="Search" placeholder="">
      </form>
      <h3>Welcome <strong><?php echo $_SESSION['first_name']; ?></strong> to MU Furniture</h3>
    <?php endif; ?>
  </body>
</html>
<?php
    showDrawers();
?>