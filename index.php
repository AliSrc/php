<?php
// die(phpinfo());
use Ali\Core\{Router, Request};

require 'vendor/autoload.php';
require 'core/bootstrap.php';

Router::load('ali/routes.php')
    ->direct(Request::uri(), Request::method());
