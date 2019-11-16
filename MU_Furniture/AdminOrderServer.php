<?php
//Delete User Script
if (isset($_POST['deleteOrder_btn'])) {

  $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $Delquery = "DELETE FROM ORDERS WHERE user_id='$user_id'";

    if (mysqli_query($conn, $Delquery)) {
        header('location:AdminOrders.php');
        echo "Success";
    } else {
      echo "Error try again.";
    }
  
  mysqli_close($conn);
}
?>