<?php


$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('menu', 'PagesController@menu');

$router->get('firstInstall', 'PagesController@firstInstall');
$router->post('firstInstall', 'PagesController@firstInstallStore');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');

$router->get('registration', 'RegistrationController@index');
$router->post('registration', 'RegistrationController@store');

$router->get('menu', 'MenuController@index');
$router->get('addmenu', 'MenuController@addMenu');
$router->post('addmenu', 'MenuController@store');
$router->get('addtopping', 'MenuController@addtopping');
$router->post('addtopping', 'MenuController@storeTopping');
$router->get('editpizza', 'MenuController@editPizza');

