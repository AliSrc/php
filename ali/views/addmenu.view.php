 <?php
$title = "Ali Sarac Website";
require 'partials/head.php';
?>

<form method="POST" action="/addmenu" enctype="multipart/form-data ">
  <div class="form-group">
    <label>Number</label>
    <input type="text" class="form-control" name="number" id="number" placeholder="Enter Pizza Number">
  </div>
  <div class="form-group">
    <label>Pizza Name</label>
    <input type="text" class="form-control" name="pizzaName" id="pizzaName" placeholder="Enter Pizza Name">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
  </div>
  <div class="form-group">
      <label for="inputState">Category</label>
      <select name="category" id="inputState" class="form-control">
        <option selected>Choose Category</option>
        <?php foreach ($categories as $category) : ?>
          <option name="<?= "$category->category_name"; ?>" value="<?= "$category->category_id"; ?>" ><?= "$category->category_name"; ?></option>
        <?php endforeach; ?>
      </select>



  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require 'partials/footer.php';
