<?php

$title = "PHP Learning | Users";
require 'partials/head.php';
?>
<div class="row">
  <div class="col">
    <h1>Users</h1>
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
    <form method="POST" action="/users">
      <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name">
        <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
    <a href="/registration">New User?</a>
  </div>
<!--   <div class="col">
     <form method="GET" action="/users">
      <div class="form-group">
        <label for="id">ID</label>
        <input name="id" type="text" class="form-control" id="id" aria-describedby="id" placeholder="Enter ID">
        <small id="emailHelp" class="form-text text-muted">Sure to delete the name?</small>
      </div>
      <button type="submit" class="btn btn-primary">Delete</button>
    </form>
  </div> -->
</div>
<?php
require 'partials/footer.php';
