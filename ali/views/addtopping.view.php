<?php
$title = "Ali Sarac Website | Add Toppings";
require 'partials/head.php';
?>
<div class="container">
  <div class="row justify-content-around">
    <div class="col-md-7">
      <form method="POST" action="/addtopping" enctype="multipart/form-data ">
        <div class="form-group">
          <label>Topping Name</label>
          <input type="text" class="form-control" name="topping" id="topping" placeholder="Enter Topping name" autofocus>
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="text" class="form-control" name="price" id="price" placeholder="Enter Topping Price">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/addmenu"><button type="button" class="btn btn-primary">Back </button></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <div class="card">
            <div class="card-header">
              <span class="card-title">Toppings</span>
            </div>
            <div class="card-body">
              <?php foreach ($toppings as $topping) {
              echo "<div class='float-left'>$topping->topping_name </div><div class='float-right'>$topping->price</div><br />";
              } ?>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
require 'partials/footer.php';
