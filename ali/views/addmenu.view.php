<?php
$title = "Add Product";
require 'partials/head.php';
?>
<div class="container">
  <div class="row m-1">
    <h3>Add Product</h3>
  </div>
  <div class="row justify-content-around">
    <?php if (!isset($_SESSION['admin'])): ?>
      <h3>You are now allowed to display this page!</h3>
      <?php else: ?>
<div class="col-md-2">
      <?php
echo "<label for='topping'>Pizzas</label><br />";
foreach ($pizzas as $pizza) {
    echo "<span class='font-weight-bold'>" . $pizza->pizzaNumber . ". " . ucwords("$pizza->pizzaName") . "<br />";
}

?>
      </div>
      <div class="col-md-5">
        <form method="POST" action="/addmenu" enctype="multipart/form-data">
          <div class="form-group">
            <label>Number</label>
            <input type="text" class="form-control" name="pizzaNumber" id="pizzaNumber" placeholder="Enter Pizza Number" autofocus required>
          </div>
          <div class="form-group">
            <label>Pizza Name</label>
            <input type="text" class="form-control" name="pizzaName" id="pizzaName" placeholder="Enter Pizza Name" required>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" required>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
              <option selected>Choose Category</option>
              <?php foreach ($categories as $category): ?>
              <option name="<?="$category->category_name";?>" value="<?="$category->category_id";?>" ><?=ucwords("$category->category_name");?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="topping">Toppings</label><br />
            <?php foreach ($toppings as $topping): ?>
            <input type="checkbox" id="<?=$topping->topping_id?>" name="tops[]" value="<?=$topping->topping_id?>"/> <label for="<?=$topping->topping_id?>"> <?=ucwords("$topping->topping_name")?> </label><br />
            <?php endforeach;?>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-xs-12 button-wrapper mb-3 m-1">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/addtopping"><button type="button" class="btn btn-primary">Add Toppings</button></a>
            <a href="/category"><button type="button" class="btn btn-primary">Add Category</button></a>
            <a href="/menu"><button type="button" class="btn btn-primary">Menu</button></a>
          </div>
        </div>
      </form>

    <?php endif?>

      <?php
require 'partials/footer.php';
