<!DOCTYPE html>
<html class="p-3 mb-2 bg-dark text-white">
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<h1 class="p-3 mb-2 bg-dark text-white" align = "center">MU Furniture Owner portal </h1>
<p class="p-3 mb-2 bg-danger text-white" align = "center">List of Employees</p>
</html>

<?php
require 'connection.php';
$conn = getConnection();

$Display_Query = "SELECT * FROM USER WHERE user_type=2";
$results = mysqli_query($conn,$Display_Query) or die("Bad_Query : $Display_Query");

echo"<table align = 'center' border = '1'>";
echo"<tr><td>First Name</td><td>Last Name</td><td>Address</td><td>Telephone</td><td>Email</td><tr>";
while($row = mysqli_fetch_assoc($results)){
    echo"<tr><td>{$row['first_name']}</td><td>{$row['last_name']}</td><td>{$row['address']}</td><td>{$row['telephone']}</td><td>{$row['email']}</td><tr>";
}
mysqli_close($conn);
echo"</table>"

?>
<!DOCTYPE html>
<br>
<div align="center">
   <p><a href="Owner.php">Back</a></p>
   </div>
   </html>
