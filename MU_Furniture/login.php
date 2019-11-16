<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body  id ="login">
      <h1 class="text-light bg-dark" align ="center" style="font-family:verdana;">Welcome to MU Furniture Store</h1>
      <br>
      <br>
      <br>
      <br>
    <div align = "center">
      <form class="" action="server.php" method="post">
        <input type="email" name="email" value="" placeholder="Email" required autofocus>
        <input type="password" name="password1" value="" placeholder="Password" required>
        <select class="" name="user_type" required>
         <option value="1">Customer</option>
          <option value="2">Employee</option>
          <option value="3">Owner</option>
          <option value="4">Admin</option>
        </select>
        <button type="submit" name="login_btn">Login</button>
        <p>Not a user? <a href="register.php">Register</a></p>
      </form>
    </div>
  </body>
</html>
