<?php

use Ali\Core\App;
use Ali\Core\Database\Connection;
use Ali\Core\Database\QueryBuilder;
require 'functions.php';

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));

function view($name, $data = []) {
	extract($data);

	return require "ali/views/{$name}.view.php";
}

function redirect($path, $data = []) {
	extract($data);
	header("Location: /{$path}");
}
