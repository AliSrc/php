<?php
$title = "Ali Sarac Website";
require 'partials/head.php';
?>
<div class="row">
    <h3>Welcome</h3>
</div>
<div id="root">
    <div class="row">
        <input type="text" autofocus id="input" v-model="message" />
    </div>
    <div class="row">
        <p name="input">Value of this input: {{ message }}</p>
    </div>

        <?php
if (isset($errorMessage)) {
    echo "<p>$errorMessage</p> ";
}
?>
</div>
<?php
require 'partials/footer.php';
