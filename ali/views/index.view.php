<?php
$title = "Ali Sarac Website";
require 'partials/head.php';
?>
<div class="row">
    <h3>Welcome</h3>
</div>
<div class="row" id="root">
    <input type="text" id="input" v-model="message">
    <p>Value of this input: {{ message }}</p>
<script>
    new Vue({
        el:'#root',
        data : {
            message :'Hello World'
        }
    })
</script>
    <?php
if (isset($errorMessage)) {
    echo "<p>$errorMessage</p> ";
}
?>
</div>
<?php
require 'partials/footer.php';
