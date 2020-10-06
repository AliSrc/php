<?php
$title = "PHP Learning | Logged out";
require 'partials/head.php';
?>
<div class="row">
    <h3>You are now logged out! </h3>
</div>
<?php
session_unset();
session_destroy();
require 'partials/footer.php';
