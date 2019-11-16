<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class = "p-3 mb-2 bg-dark text-white">
<h1 align = "center">MU Furniture Admin portal </h1>
</div>
</html>

<?php
require 'connection.php';
$conn = getConnection();

$Display_Query = "SELECT * FROM USER";
$results = mysqli_query($conn,$Display_Query) or die("Bad_Query : $Display_Query");

echo"<table align = 'center' border = '1'>";
echo"<tr><td>User Type</td><td>First Name</td><td>Last Name</td><td>Address</td><td>Telephone</td><td>SSN</td><td>Gender</td><td>Salary</td><td>Email</td><tr>";
while($row = mysqli_fetch_assoc($results)){
    echo"<tr><td>{$row['user_type']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td><td>{$row['address']}</td><td>{$row['telephone']}</td><td>{$row['ssn']}</td><td>{$row['gender']}</td><td>{$row['salary']}</td><td>{$row['email']}</td><tr>";
}
mysqli_close($conn);
echo"</table>"

?>


<!DOCTYPE html>

<link rel="stylesheet" href="AdminUser.css">
<body class="p-3 mb-2 bg-warning text-dark">
    <p align ="center">Enter user information to Add/Delete/Update<p>
    <div align ="center">
      <form action="AdminServer.php" method="post">
        <input type="first name" name="fname" value="" placeholder="First Name" autofocus>
        <input type="last name" name="lname" value="" placeholder="Last Name">

       <input type="email" name="email" value="" placeholder="email" required>

       <input type="text" name="address" value="" placeholder="address">

       <input type="tel" name="telephone" value="" placeholder="telephone">

       <input type="password" name="password1" value="" placeholder="password">

       <input type="password" name="password2" value="" placeholder="confirm password">

       <select class="" name="user_type" required>
         <option value="1">Customer</option>
          <option value="2">Employee</option>
          <option value="3">Owner</option>
          <option value="4">Admin</option>
        </select>
        <br>
        <br>
        <button type="submit" name="register_btn">Add</button>
        <button type="submit" name="deregister_btn">Delete</button>
        <button type="submit" name="update_btn">Update</button>
        <p><a href="Admin.php">Back</a></p>
      </form>
    </div>
  </body>
  <div class="p-3 mb-2 bg-dark text-white">
      <br>
      <br>
      <br>
      <br>
  </div>

</html>
