<?php
$title = "Menu | Pizza";
require 'partials/head.php';
?>
<div class="container">
  <div class="row justify-content-around">
    <div class="col-md-3 m-1">
      <div class="card">
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
    <div class="col-md-5 m-1">
      <div class="card">
        <div class="card-header">
          Menu
        </div>
        <div class="card-body">
          <?php
          foreach ($pizzas as $pizza){
          echo "<div class='float-left'><span class='font-weight-bold'>$pizza->pizza_number. $pizza->pizza_name </span><span class='text-secondary'>";
          foreach ($toppings as $topping) {
          if ($topping->pizza_number == $pizza->pizza_number){
          $ptopping = $topping->topping_name;
          echo "$ptopping ";
          }
          }
          echo "</div></span><div class='float-right'>$pizza->price,-</div><br />";
          }
          ?>
        </div>
      </div>
    </div>
    <div class="col-md-3 m-1">
      <div class="card">
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
          <div class="col-xs-12 button-wrapper mb-3 m-1">
        <a href="/addmenu"><button class="btn mt-2 btn-primary">Add Product?</button></a>
        </div>
      </div>
  <?php
  require 'partials/footer.php';
