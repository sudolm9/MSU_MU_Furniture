<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <p align ="center">Register for an Account</p>
    <div align ="center" class="">
      <form class="" action="server.php" method="post">
        <input type="text" name="fname" value="" placeholder="First Name" required autofocus>
        <br>
        <input type="text" name="lname" value="" placeholder="Last Name" required>
        <br>
        <input type="text" name="address" value="" placeholder="address">
        <br>
       <input type="tel" name="telephone" value="" placeholder="telephone">
       <br>
        <input type="email" name="email" value="" placeholder="Email" required>
      <br>
        <input type="password" name="password1" value="" placeholder="Password" required>
        <br>
        <input type="password" name="password2" value="" placeholder="Confirm Password" required>
        <br>
        <select class="" name="user_type" required>
         <option value="1">Customer</option>
        </select>
        <br>
        <button type="submit" name="register_btn">Register</button>
        <p>Already a user?<a href="login.php">Log in</a></p>
      </form>
    </div>
  </body>
</html>
