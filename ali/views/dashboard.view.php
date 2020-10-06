<?php
$title = "PHP Learning | Admin Dashboard";
require 'partials/head.php';
?>
<?php if (!isset($_SESSION['username'])): ?>
<div class="row">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <p>You are not logged in!</p>
</div>
<?php else: ?>
<div class="row">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <?php if (!$_SESSION['username']): ?>
    <p>You are not logged in!</p>
    <?php else: ?>
    <p>Hello <?=$_SESSION['username'];?> </p>
</div>
<div class="row">
    <p><a href="logout">Log out?</a></p>
</div>
    <?php endif?>
<?php endif?>
<?php
require 'partials/footer.php';
