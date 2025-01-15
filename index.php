<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use src\http\Route;

require_once __DIR__ . '/vendor/autoload.php';

$route = new Route();

$route->get('/', 'HomeController', 'index');
$route->get('/home', 'HomeController', 'index');
$route->post('/signup', 'AuthController', 'signup');
$route->post('/login', 'AuthController', 'login');
$route->get('/logout', 'AuthController', 'logout');
$route->get('/adminDash', 'AdminController', 'dashboard');
$route->get('/instructorDash', 'InstructorController', 'dashboard');

$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
