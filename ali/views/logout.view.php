<?php
$title = "PHP Learning | Logged out";
require 'partials/head.php';
?>
<div class="row">
    <h1>You are now logged out! </h1>
</div>
<?php
session_unset();
session_destroy();
require 'partials/footer.php';
