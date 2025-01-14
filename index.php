<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use src\http\Route;

require_once __DIR__ . '/vendor/autoload.php';

// Initialize the route system
$route = new Route();

// Define routes
$route->get('/', 'HomeController', 'index');

// Resolve the request
$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
