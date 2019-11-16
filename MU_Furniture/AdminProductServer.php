<?php
require 'connection.php';
$conn = getConnection();


//Add Product Script
if (isset($_POST['Prodregister_btn'])) {
  $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);

if($product_type != $product_type){
    echo"Invalid product";
}else{
    
$Prodregister_query = "INSERT INTO PRODUCT (product_type, product_name, quantity, price, description) VALUES ('$product_type' ,'$product_name', '$quantity', '$price', '$description')";

    if (mysqli_query($conn, $Prodregister_query)) {
        header('location:AdminSofa.php');
        echo "Success";
    } else {
      echo "Error.";
    }
}
  mysqli_close($conn);
}

//Delete Product Script
if (isset($_POST['Prodderegister_btn'])) {

  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);

    $Prodderegister_query = "DELETE FROM PRODUCT WHERE product_name='$product_name'";

    if (mysqli_query($conn, $Prodderegister_query)) {
        header('location:AdminSofa.php');
        echo "Success";
    } else {
      echo "Error try again.";
    }
  
  mysqli_close($conn);
}

//Update Product Script
if (isset($_POST['Produpdate_btn'])) {
  $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $image = mysqli_real_escape_string($conn, $_POST['image']);
 

if($product_name != $product_name){
    echo"Names do not match";
    }else{
    $Produpdate_query = ("UPDATE PRODUCT SET product_type = '$product_type', quantity = '$quantity', price = '$price', description = '$description', image = '$image' WHERE product_name = '$product_name'");

    if (mysqli_query($conn, $Produpdate_query)) {
        header('location:AdminSofa.php');
        echo "Success";
    } else {
      echo "Error try again.";
    }
}
  mysqli_close($conn);
}
?>
