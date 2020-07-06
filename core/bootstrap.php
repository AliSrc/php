<?php

use Ali\Core\App;
use Ali\Core\Database\{QueryBuilder, Connection};
require 'functions.php';

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function view($name, $data = [])
{
    extract($data);

    return require "ali/views/{$name}.view.php";
}

function redirect($path)
{
header("Location: /{$path}");
}
