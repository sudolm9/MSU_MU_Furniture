<!DOCTYPE html>
<html class="p-3 mb-2 bg-dark text-white">
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<h1 class="p-3 mb-2 bg-dark text-white"align = "center">MU Furniture Admin portal </h1>
<p class="p-3 mb-2 bg-success text-white"align = "center">List of Orders</p>
</html>

<?php
require 'connection.php';
$conn = getConnection();

$Display_Query = "SELECT * FROM ORDERS WHERE 1";
$results = mysqli_query($conn,$Display_Query) or die("Bad_Query : $Display_Query");

echo"<table align = 'center' border = '1'>";
echo"<tr><td>User ID</td><td>Product ID</td><td>Product Quantity</td><td>Total</td><td>Date</td><tr>";
while($row = mysqli_fetch_assoc($results)){
    echo"<tr><td>{$row['user_id']}</td><td>{$row['product_id']}</td><td>{$row['quantity']}</td><td>{$row['total']}</td><td>{$row['date']}</td><tr>";
}
mysqli_close($conn);
echo"</table>"

?>
<!DOCTYPE html>
<br>
<div align="center">
   <p><a href="Employee.php">Back</a></p>
   </div>
   </html>