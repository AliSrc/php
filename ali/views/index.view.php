<?php
$title = "Ali Sarac Website";
require 'partials/head.php';
?>
<div class="row">
    <h4>Welcome</h4>
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
