<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use src\http\Route;

require_once './utils.php';

$route = new Route();

$route->get('/', 'HomeController', 'index');
$route->get('/home', 'HomeController', 'index');
$route->post('/signup', 'AuthController', 'signup');
$route->post('/signin', 'AuthController', 'login');
$route->get('/logout', 'AuthController', 'logout');
$route->get('/admin/dashboard', 'AdminController', 'dashboard');
$route->get('/instructor/dashboard', 'InstructorController', 'dashboard');
$route->post('/course/add', 'CourseController', 'addCourse');
$route->post('/instructor/course/archive', 'CourseController', 'archiveCourse');
$route->post('/instructor/course/edit', 'CourseController', 'editCourse');
$route->get('/instructor/course/details/{id}', 'CourseController', 'getCourseDetails');
$route->post('/instructor/course/status', 'CourseController', 'toggleCourseStatus');
$route->post('/admin/manage-user', 'AdminController', 'manageUser');
$route->get('/courses', 'CourseController', 'listCourses');
$route->get('/course/{id}', 'CourseController', 'showCourseDetails');
$route->post('/enroll/{id}', 'CourseController','enroll');
$route->get('/my-courses', 'CourseController','myCourses');

$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);