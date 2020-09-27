<?php
$title = "PHP Learning | FirstInstall";
require 'partials/head.php';
?>
<div class="row">
    <div class="col">
        <h4>First Install</h4>
        <p><strong>This is the first install of Database tables, after you created Database and setup the connection.</strong></p>
        <p>Click on the button below to create tables that required.</p>
        <form method="POST" action="/firstInstall" enctype="multipart/form/data">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Install Database</button>
            </div>
        </form>
    </div>
</div>
<?php
require 'partials/footer.php';
