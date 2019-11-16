<?php
session_start();
require 'connection.php';
$conn = getConnection();


// Register User Script
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
        header('location:login.php');
        echo "Success";
    } else {
      echo "Error try again.";
    }
  }
  mysqli_close($conn);
}

// Login User Script
if (isset($_POST['login_btn'])) {
  $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password1']);
  $hashedPassword = md5($password);

  if($hashedPassword != $password){
      header('Location:login.php');
  }

  //check if there is only 1 user
  $login_query = "SELECT * FROM USER WHERE email = '$email' AND password = '$hashedPassword' AND user_type = '$user_type'";
  $result = mysqli_query($conn, $login_query);

  if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['email'] == $email && $row['password'] == $hashedPassword && $row['user_type'] == '1') {
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $_SESSION['first_name'] = $first_name;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Logged in successfully";
        header('Location:index.php');

      }
    }
    }
}

//Employee Login
if (isset($_POST['login_btn'])) {
  $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password1']);
  $hashedPassword = md5($password);

  //check if there is only 1 user
  $Adlogin_query = "SELECT * FROM USER WHERE email = '$email' AND password = '$hashedPassword' AND user_type = '$user_type'";
  $Adresult = mysqli_query($conn, $Adlogin_query);

  if (mysqli_num_rows($Adresult) == 1) {
    while ($row = mysqli_fetch_assoc($Adresult)) {
      if ($row['email'] == $email && $row['password'] == $hashedPassword && $row['user_type'] == '2') {
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $_SESSION['first_name'] = $first_name;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Logged in successfully";
        header('Location:Employee.php');

      }
    }
    }

}

//Owner Login
if (isset($_POST['login_btn'])) {
  $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password1']);
  $hashedPassword = md5($password);

  //check if there is only 1 user
  $Adlogin_query = "SELECT * FROM USER WHERE email = '$email' AND password = '$hashedPassword' AND user_type = '$user_type'";
  $Adresult = mysqli_query($conn, $Adlogin_query);

  if (mysqli_num_rows($Adresult) == 1) {
    while ($row = mysqli_fetch_assoc($Adresult)) {
      if ($row['email'] == $email && $row['password'] == $hashedPassword && $row['user_type'] == '3') {
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $_SESSION['first_name'] = $first_name;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Logged in successfully";
        header('Location:Owner.php');

      }
    }
    }

}

//Admin Login
if (isset($_POST['login_btn'])) {
  $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password1']);
  $hashedPassword = md5($password);

  //check if there is only 1 user
  $Adlogin_query = "SELECT * FROM USER WHERE email = '$email' AND password = '$hashedPassword' AND user_type = '$user_type'";
  $Adresult = mysqli_query($conn, $Adlogin_query);

  if (mysqli_num_rows($Adresult) == 1) {
    while ($row = mysqli_fetch_assoc($Adresult)) {
      if ($row['email'] == $email && $row['password'] == $hashedPassword && $row['user_type'] == '4') {
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $_SESSION['first_name'] = $first_name;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Logged in successfully";
        header('Location:Admin.php');

      }
    }
    }
  mysqli_close($conn);
}

 ?>
