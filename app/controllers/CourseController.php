<?php

namespace App\controllers;

use App\models\CourseModel;
use App\entities\TextCourse;
use App\entities\VideoCourse;

class CourseController
{
    private CourseModel $model;

    public function __construct()
    {
        $this->model = new CourseModel();
    }

    public function addCourse(): void
    {
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
            $categoryID = (int)$_POST['categoryID'];
            if (empty($title) || empty($description) || empty($contentType) || empty($content) || empty($categoryID)) {
                $this->sendError("All fields are required.");
                return;
            }
            $category = $this->model->getCategoryName($categoryID);

            // Default status for new courses
            $status = 'published';

            if ($contentType === 'text') {
                $course = new TextCourse(
                    0, // ID (0 for new course)
                    $title,
                    $description,
                    $contentType,
                    $content,
                    $category,
                    $user,
                    $status,
                    $tags
                );
            } elseif ($contentType === 'video') {
                $course = new VideoCourse(
                    0, // ID (0 for new course)
                    $title,
                    $description,
                    $contentType,
                    $content,
                    $category,
                    $user,
                    $status,
                    $tags,
                );
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

    public function listCourses(): void
    {
        $page = $_GET['page'] ?? 1;
        $limit = 4;
        $offset = ($page - 1) * $limit;
        $courses = $this->model->getCourses($limit, $offset);
        $totalCourses = $this->model->getTotalCourses();
        $totalPages = ceil($totalCourses / $limit);
        require_once __DIR__ . '/../views/courses.php';
    }

    public function archiveCourse(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user'])) {
                $this->sendError("User not logged in.");
                return;
            }

            $courseID = (int)$_POST['courseID'];
            $userID = $_SESSION['user']->getId();

            if ($this->model->archiveCourse($courseID, $userID)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to archive course']);
            }
        }
    }

    public function editCourse(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user'])) {
                $this->sendError("User not logged in.");
                return;
            }

            $courseID = (int)$_POST['courseID'];
            $userID = $_SESSION['user']->getId();

            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'categoryID' => (int)$_POST['categoryID'],
                'tags' => explode(',', trim($_POST['tags'])),
            ];

            if ($this->model->updateCourse($courseID, $userID, $data)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update course']);
            }
        }
    }
    private function sendError(string $message): void
    {
        if ($this->isHtmxRequest()) {
            echo "<div class='text-red-500 text-sm mt-2 text-center'>{$message}</div>";
        } else {
            $_SESSION['course_error'] = $message;
            header("Location: /instructor/dashboard");
        }
        exit;
    }

    private function isHtmxRequest(): bool
    {
        return isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true';
    }
}
