<?php
$title = "Ali Sarac Website";
require 'partials/head.php';
?>

<form method="POST" action="/addmenu" enctype="multipart/form-data ">
  <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require 'partials/footer.php';
