<?php
$title = "PHP Learning | Admin";
require 'partials/head.php';
?>
<body>
    <div class="row">
        <h3>Admin panel</h3>
    </div>
    <div class="row">
        <form method="POST" action="/admin" enctype="multipart/form-data">
            <div class="form-group">
                <?php if (isset($errorMessage)): ?>
                <p><?=$errorMessage?></p>
                <?php endif?>
                <label for="admin">Admin</label> <input type="text" class="form-control" id="admin" name="admin" aria-describedby=
                "emailHelp" placeholder="Username" autofocus="">
            </div>
            <div class="form-group">
                <label for="adminPassword">Password</label> <input type="password" class="form-control" id=
                "adminPassword" name="adminPassword" placeholder="Password">
            </div><button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
<?php
require 'partials/footer.php';
