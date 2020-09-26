 <?php
$title = "Ali Sarac Website | Add Toppings";
require 'partials/head.php';
?>

<form method="POST" action="/addtopping" enctype="multipart/form-data ">

  <div class="form-group">
    <label>Topping Name</label>
    <input type="text" class="form-control" name="topping" id="topping" placeholder="Enter Topping name">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="Enter Topping Price">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="form-group">
    <div class="card">
      <div class="card-header">
        Toppings
      </div>
        <?php foreach ($toppings as $topping) {
        echo "<li class='list-group-item'> <div class='float-left'>$topping->topping_name </div><div class='float-right'>$topping->price</div></li>";
          } ?>
    </div>
  </div>
</form>

<?php
require 'partials/footer.php';
