<?php
$title = "Ali Sarac Website";
require 'partials/head.php';
?>
<div class="container">
  <div class="row justify-content-around">
    <div class="col-md-2">
      <?php
      echo "<label for='topping'>Pizzas</label><br />";
      foreach ($pizzas as $pizza){
      echo "<span class='font-weight-bold'>$pizza->pizza_number. $pizza->pizza_name<br />";
        }
        ?>
      </div>
      <div class="col-md-5">
        <form method="POST" action="/addmenu" enctype="multipart/form-data ">
          <div class="form-group">
            <label>Number</label>
            <input type="text" class="form-control" name="pizza_number" id="pizza_number" placeholder="Enter Pizza Number" autofocus>
          </div>
          <div class="form-group">
            <label>Pizza Name</label>
            <input type="text" class="form-control" name="pizza_name" id="pizza_name" placeholder="Enter Pizza Name">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
              <option selected>Choose Category</option>
              <?php foreach ($categories as $category) : ?>
              <option name="<?= "$category->category_name"; ?>" value="<?= "$category->category_id"; ?>" ><?= "$category->category_name"; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="topping">Toppings</label><br />
            <?php foreach ($toppings as $topping) : ?>
            <input type="checkbox" name="tops[]" value="<?= $topping->topping_id ?>"/> <?= $topping->topping_name ?> <br />
            <?php endforeach; ?>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="mt-2">
          <a href="/addtopping"><button class="btn btn-primary">Add Toppings</button></a>
        </div>
      </div>
    </div>
  </div>
  <?php
  require 'partials/footer.php';
