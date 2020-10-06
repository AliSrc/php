<?php
$title = "Ali Sarac Website";
require 'partials/head.php';
?>
<div class="row">
    <h3>Welcome</h3>
</div>
<div class="row">
    <?php
if (isset($errorMessage)) {
    echo "<p>$errorMessage</p> ";
}
?>
</div>
<?php
require 'partials/footer.php';
