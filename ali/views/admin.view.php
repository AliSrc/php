<?php
$title = "PHP Learning | Admin";
require 'partials/head.php';
?>
<body>

    <div class="row">
        <h2>Admin panel</h2>
        <?php
// var_dump($user);
?>
    </div>
    <div class="row">
        <form method="POST" action="/admin" enctype="multipart/form-data">
            <div class="form-group">
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
