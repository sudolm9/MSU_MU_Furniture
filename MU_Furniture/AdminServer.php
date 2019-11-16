<?php
require 'connection.php';
$conn = getConnection();


//Add User Script
if (isset($_POST['register_btn'])) {
  $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
  $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
  $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

  if ($password1 != $password2) {
    echo "Passwords do not match, try again.";
  } else {
    $password = md5($password1);
    $register_query = "INSERT INTO USER (user_type, first_name, last_name, address, telephone, email, password) VALUES ('$user_type','$first_name', '$last_name','$address','$telephone', '$email', '$password')";

    if (mysqli_query($conn, $register_query)) {
        header('location:UserList.php');
        echo "Success";
    } else {
      echo "Error try again.";
    }
  }
  mysqli_close($conn);
}

//Delete User Script
if (isset($_POST['deregister_btn'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);

    $register_query = "DELETE FROM USER WHERE email='$email'";

    if (mysqli_query($conn, $register_query)) {
        header('location:UserList.php');
        echo "Success";
    } else {
      echo "Error try again.";
    }

  mysqli_close($conn);
}

//Update User Script
if (isset($_POST['update_btn'])) {
  $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
  $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
  $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

  if ($password1 != $password2) {
    echo "Passwords do not match, try again.";
  } else {
    $password = md5($password1);
    $update_query = ("UPDATE USER SET last_name = '$last_name', address = '$address', telephone = '$telephone' WHERE email = '$email'");

    if (mysqli_query($conn, $update_query)) {
        header('location:UserList.php');
        echo "Success";
    } else {
      echo "Error try again.";
    }
  }
  mysqli_close($conn);
}


?>
