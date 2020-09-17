<?php


$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('menu', 'PagesController@menu');
$router->get('firstInstall', 'PagesController@firstInstall');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');

$router->get('registration', 'RegistrationController@index');
$router->post('registration', 'RegistrationController@store');

$router->get('addmenu', 'MenuController@index');
$router->post('addmenu', 'MenuController@store');


