<?php
$title = "PHP Learning | Users";
require 'partials/head.php';
?>
<div class="row">
  <div class="col">
    <h3>Users</h3>
  </div>
  <div>
    <?php
if (isset($message)) {?>
    <p><?php echo $message; ?></p>
    <?php }?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card mr-2">
      <div class="card-header">
        Users
      </div>
      <div class="card-body bg-white">
        <div class="card-link">
          <?php foreach ($users as $user): ?>
          <?="$user->id: $user->name $user->lastname <br />";?>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-2 mt-2">
    <a href="/registration"><button class="btn btn-primary">New User?</button></a>
  </div>
  <?php
require 'partials/footer.php';
