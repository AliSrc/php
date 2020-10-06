
<?php

use Ali\Core\App;
use Ali\Core\Database\AdminQuery;
use Ali\Core\Database\Connection;
use Ali\Core\Database\PizzaQuery;
use Ali\Core\Database\QueryBuilder;
require 'functions.php';
session_start();

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])));

/* Use Queires for pizzas */
App::bind('pizzaQuery', new PizzaQuery(
    Connection::make(App::get('config')['database'])));

/* Use Queries for Admins*/
App::bind('adminQuery', new AdminQuery(
    Connection::make(App::get('config')['database'])));

function view($name, $data = [])
{
    extract($data);

    return require "ali/views/{$name}.view.php";
}

function redirect($path, $data = [])
{
    extract($data);
    header("Location: /{$path}");
}
