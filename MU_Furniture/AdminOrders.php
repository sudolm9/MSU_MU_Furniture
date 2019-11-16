

<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div = class ="p-3 mb-2 bg-warning text-dark">
<h1 align = "center">MU Furniture Admin portal </h1>
<p align = "center">List of Orders</p>
</div>
</html>

<?php
require 'connection.php';
$conn = getConnection();

$Display_Query = "SELECT * FROM ORDERS WHERE 1";
$results = mysqli_query($conn,$Display_Query) or die("Bad_Query : $Display_Query");

echo"<table align = 'center' border = '1'>";
echo"<tr><td>User ID</td><td>Product ID</td><td>Product Quantity</td><td>Price</td><td>Shipping</td><td>Total</td><tr>";
while($row = mysqli_fetch_assoc($results)){
    echo"<tr><td>{$row['user_id']}</td><td>{$row['product_id']}</td><td>{$row['product_quantity']}</td><td>{$row['price']}</td><td>{$row['shipping']}</td><td>{$row['total']}</td><tr>";
}
mysqli_close($conn);
echo"</table>"

?>



<!DOCTYPE html>
<html class="p-3 mb-2 bg-secondary text-white">
<div align ="center">
    <form class="" action="AdminOrderServer.php" method="post">
        <br>
        <br>
    <input type ="number" name="user_id" value="" palceholder="User ID">
 <button type="submit" name="deleteOrder_btn">Delete</button>
    <p><a href="Admin.php">Back</a></p>
 </form>
 </div>
</html>

