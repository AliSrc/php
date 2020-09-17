<?php

$title = "PHP Learning | Users";
require 'partials/head.php';
?>
<div class="row">
  <div class="col">
    <h1>Users</h1>
  </div>
  <div>
    <?php
    if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
      <?php } ?>

  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <ul class="list-group list-group-flush">
      <?php foreach ($users as $user) : ?>
        <li class='list-group-item'><?= "$user->id: $user->name $user->lastname "; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col-md-2">
    <a href="/registration">New User?</a>
  </div>

<?php
require 'partials/footer.php';
