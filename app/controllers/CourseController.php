<?php

namespace App\controllers;

use App\models\CourseModel;
use App\entities\TextCourse;
use App\entities\VideoCourse;

class CourseController {
    private CourseModel $model;

    public function __construct() {
        $this->model = new CourseModel();
    }

    public function addCourse(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_SESSION['user'])) {
                $this->sendError("User not logged in.");
                return;
            }

            $user = $_SESSION['user'];
            $userID = $user->getId(); 

            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $contentType = trim($_POST['contentType']);
            $tags = explode(',', trim($_POST['tags'])); 
            $content = trim($_POST['content']);
            $categoryID = trim($_POST['categoryID']); 

          
            if (empty($title) || empty($description) || empty($contentType) || empty($content) || empty($categoryID)) {
                $this->sendError("All fields are required.");
                return;
            }

            if ($contentType === 'text') {
                $course = new TextCourse(0, $title, $description, $contentType, $content, $tags);
            } elseif ($contentType === 'video') {
                $course = new VideoCourse(0, $title, $description, $contentType, $content, $tags);
            } else {
                $this->sendError("Invalid content type.");
                return;
            }
            if ($this->model->addCourse($course, $userID, $categoryID)) {
                if ($this->isHtmxRequest()) {
                    echo "<div class='text-green-500 text-sm mt-2 text-center'>Course added successfully!</div>";
                } else {
                    $_SESSION['course_success'] = "Course added successfully!";
                    header("Location: /instructor/dashboard");
                }
            } else {
                $this->sendError("Failed to add course.");
            }
        }
    }

    public function listCourses(): void {
        $page = $_GET['page'] ?? 1;
        $limit = 4;
        $offset = ($page - 1) * $limit;
        $courses = $this->model->getCourses($limit, $offset);
        $totalCourses = $this->model->getTotalCourses();
        $totalPages = ceil($totalCourses / $limit);
        require_once __DIR__ . '/../views/courses.php';
    }
    private function sendError(string $message): void {
        if ($this->isHtmxRequest()) {
            echo "<div class='text-red-500 text-sm mt-2 text-center'>{$message}</div>";
        } else {
            $_SESSION['course_error'] = $message;
            header("Location: /instructor/dashboard");
        }
        exit;
    }

    private function isHtmxRequest(): bool {
        return isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true';
    }
}