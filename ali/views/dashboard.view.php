<?php
$title = "PHP Learning | Admin Dashboard";
require 'partials/head.php';
?>
<div class="row">
    <h3>Dashboard</h3>
</div>
<?php if (!isset($_SESSION['admin'])): ?>
<div class="row">
    <p>You are not logged in!</p>
</div>
<?php else: ?>
<div class="row">
    <?php if (!$_SESSION['admin']): ?>
    <p>You are not logged in!</p>
    <?php else: ?>
    <p>Hello <?=$_SESSION['admin'];?> </p>
</div>
<div class="row">
    <p><a href="logout">Log out?</a></p>
</div>
    <?php endif?>
<?php endif?>
<?php
require 'partials/footer.php';
