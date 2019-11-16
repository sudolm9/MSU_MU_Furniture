<?php

require 'AdminProducts.php';
?>

<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<html class ="p-3 mb-2 bg-warning text-dark">
<html lang="en" dir="ltr">
    <div align="center">
  <head>
    <meta charset="utf-8">
    <title>Welcome to MU</title>
  </head>
  <body>

    <?php if ($_SESSION['user_id']): ?>
      <form class="" action="login.php" method="post">
        <button type="submit"><a href="AdminProductOptions.php">Product Options</a></button>
         <br>
        <br>
        <button type="submit"><a href="login.php">Logout</a></button>
        <p><a href="Admin.php">Back</a></p>
      </form>
       <body>
      <div>
          <nav class ="navbar navbar-expand-lg navbar-light bg light" >
    <a class="navbar-brand">Categories:</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active text-warning" href="AdminSofa.php">Sofa's</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-warning" href="Adminchair.php">Chair's</a>
        <li>
        <a class="nav-link active text-warning" href="Admintable.php">Table's</a>
      </li>
      <li>
        <a class="nav-link active text-warning" href="Admindrawer.php">Drawer's</a>
      <li>
        <a class="nav-link active text-warning" href="Adminbed.php">Bed's</a>
      </li>
    </ul>
  </div>
  </nav>
    </div>
    <?php endif; ?>
  </body>
  </div>
</html>
<?php
    showTables();
?>