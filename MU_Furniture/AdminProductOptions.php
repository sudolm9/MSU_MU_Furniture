<!DOCTYPE html>
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<body>
    <div class="p-3 mb-2 bg-warning text-dark">
    <p align ="center">Enter product information to Add/Delete/Update<p>
        </div>
    <div align ="center" class="p-3 mb-2 bg-secondary text-white">
      <form class="" action="AdminProductServer.php" method="post">
          
           <select class="" name="product_type">
         <option value="1">Sofa</option>
          <option value="2">Bed</option>
          <option value="3">Table</option>
          <option value="4">Drawer</option>
          <option value="5">Chair</option>
        </select>
        <br>
        <br>
        <input type="text" name="product_name" value="" placeholder="Product Name">
        <br>
        <br>
        <input type="number" name="price" value="" placeholder="Price">
        <br>
        <br>
       <input type="number" name="quantity" value="" placeholder="Quantity">
       <br>
       <br>
       <input type="text" name="description" value="" placeholder="Description">
       <br>
       <br>
       <input type ="file" name = "image" accept="image/png, image/jpg, image/jpeg">
       <br>
       <br>
        <button type="submit" name="Prodregister_btn">Add</button>
        <button type="submit" name="Prodderegister_btn">Delete</button>
        <button type="submit" name="Produpdate_btn">Update</button>
        <p><a href="AdminSofa.php">Back</a></p>
      </form>
    </div>
  </body>
  <div class="p-3 mb-2 bg-warning text-dark">
      <br>
      <br>
      <br>
       <br>
      <br>
      <br>
       <br>
      <br>
  </div>

</html>

