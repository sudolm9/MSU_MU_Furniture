<!DOCTYPE html>
<html = class="p-3 mb-2 bg-dark text-white" >
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div = class="p-3 mb-2 bg-dark text-white">
<h1 align = "center">MU Furniture Owner portal </h1>
<p  class="p-3 mb-2 bg-danger text-white"align = "center">List of Orders</p>
</div>
</html>

<?php
require 'connection.php';
$conn = getConnection();

$Display_Query = "SELECT * FROM ORDERS WHERE 1";
$results = mysqli_query($conn,$Display_Query) or die("Bad_Query : $Display_Query");

echo"<table align = 'center' border = '1'>";
echo"<tr><td>User ID</td><td>Product ID</td><td>Product Quantity</td><td>Total</td><td>Date</td><tr>";
while($row = mysqli_fetch_assoc($results)){
    echo"<tr><td>{$row['username']}</td><td>{$row['grades']}</td><td>{$row['comments']}</td><tr>";
}
mysqli_close($conn);
echo"</table>"

?>



<!DOCTYPE html>
<html>
<div align ="center">
    <form>
    <p><a href="Owner.php">Back</a></p>
 </form>
 </div>
</html>