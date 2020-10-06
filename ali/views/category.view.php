<?php
$title = "Categories";
require 'partials/head.php';
?>
<div class="container">
  <div class="row justify-content-around">
        <?php if (!isset($_SESSION['admin'])): ?>
      <h3>You are now allowed to display this page!</h3>
      <?php else: ?>
    <div class="col-md-2">
      <?php
echo "<label for='topping'>Pizzas</label><br />";
foreach ($categories as $category) {
    echo "<span class='font-weight-bold'>$category->category_id. $category->category_name<br />";
}
?>
      </div>
      <div class="col-md-10">
        <form method="POST" action="/category" enctype="multipart/form-data ">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category" id="category" placeholder="Category Name" autofocus required>
          </div>
      <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/addmenu"><button type="button" class="btn btn-primary">Add Product</button></a>
        <a href="/addtopping"><button type="button" class="btn btn-primary">Add Toppings</button></a>
        <a href="/menu"><button type="button" class="btn btn-primary">Menu</button></a>
        </div>
        </form>
      <?php endif?>
    </div>
  </div>
  <?php
require 'partials/footer.php';
