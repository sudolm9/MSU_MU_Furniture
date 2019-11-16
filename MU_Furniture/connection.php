<?php

function getConnection() {

  $servername = "localhost:3306";
  $username = "sudolmac_mu";
  $serverpass = "BlueAttitude73";
  $dbname = "sudolmac_mu_store";
  
  $conn = mysqli_connect($servername, $username, $serverpass, $dbname);
  return $conn;
}
 ?>
