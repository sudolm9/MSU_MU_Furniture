<?php

session_start();
if ($_SESSION['first_name'] == "") {
  header('Location:login.php');
}?>

<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <h1 class="p-3 mb-2 bg-dark text-white" align="center">MU Furniture</h1>
  </head>
  <body id="customer" class="p-3 mb-2 bg-info text-white">
          <nav class ="navbar navbar-expand-lg navbar-light bg light" >
    <a class="navbar-brand text-dark">Categories:</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active text-dark" href="sofa.php">Sofa's</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-dark" href="chair.php">Chair's</a>
        <li>
        <a class="nav-link active text-dark" href="table.php">Table's</a>
      </li>
      <li>
        <a class="nav-link active text-dark" href="drawer.php">Drawer's</a>
      <li>
        <a class="nav-link active text-dark" href="bed.php">Bed's</a>
      </li>
    </ul>
  </div>
  </nav>
    <?php if ($_SESSION['user_id']): ?>
      <h3>Welcome <strong><?php echo $_SESSION['first_name']; ?></strong> to MU Furniture</h3>
    <?php endif; ?>
  </body>
</html>
