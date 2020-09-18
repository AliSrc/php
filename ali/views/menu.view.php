<?php

$title = "Menu | Pizza";
require 'partials/head.php';
?>
<div class="container">
  <div class="row justify-content-around">
    <div class="col-md-3">
      <div class="card mr-2 ml-2">
        <div class="card-header">
          Kategorier
        </div>
        <div class="card-body bg-white">
          <div class="card-link">
            Some Link
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class=" card mr-2 ml-2">
        <div class="card-header">
          Menu
	</div>
	<?php foreach ($products as $product) : ?>
	<div class="card-body">
	dd($product->productName);
		<?= "$product->productName"; ?>
	<?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
     <div class="card mr-2 ml-2">
	<div class="card-header">
		Kurv
	</div>
	<div class="card-body">
		Some Text
	</div>
    </div>
  </div>
  </div>
</div>

  <?php
require 'partials/footer.php';
