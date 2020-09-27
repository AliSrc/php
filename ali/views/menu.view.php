<?php
$title = "Menu | Pizza";
require 'partials/head.php';
?>

<div class="container">
  <div class="row justify-content-around">
    <div class="col-md-3">
      <div class="card mr-2">
        <div class="card-header">
          Kategorier
        </div>
        <div class="card-body bg-white">
          <div class="card-link">
            <?php foreach ($categories as $category) : ?>
            <?= "<div class='float-left'>$category->category_name</div>"; ?><br />
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class=" card mr-2 ml-2">
        <div class="card-header">
          Menu
        </div>
        <div class="card-body">

          <?php
          $test = new Pizzas();

          foreach ($pizzas as $pizza){
            echo "<div class='d-flex justify-content-between'>$pizza->pizza_number. $pizza->pizza_name ";
            foreach ($toppings as $topping) {
              if ($topping->pizza_number == $pizza->pizza_number){
                $ptopping = $topping->topping_name;
                echo "$ptopping ";
                }
              }
              echo "<div>$pizza->price,</div></div>";
            }

          ?>

          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card ml-2">
          <div class="card-header">
            Kurv
          </div>
          <div class="card-body">
            Some Text
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col mt-2">
        <a href="/addmenu"><button class="btn btn-primary">Add Product</button></a>
      </div>
    </div>
    <?php
    require 'partials/footer.php';
