<?php

namespace App\controllers;

use App\entities\Student;
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

            $status = 'published';

            if ($contentType === 'text') {
                $course = new TextCourse(
                    0, 
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
                    0,
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
            $rawData = file_get_contents('php://input');

            error_log('Raw POST data: ' . $rawData);
            $data = json_decode($rawData, true);
            error_log('Decoded data: ' . print_r($data, true));

            if (!isset($data['courseID'])) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Course ID is missing.']);
                return;
            }

            if (!isset($_SESSION['user'])) {
                http_response_code(401);
                echo json_encode(['success' => false, 'message' => 'User not logged in.']);
                return;
            }

            $courseID = (int)$data['courseID'];
            $userID = $_SESSION['user']->getId();

            error_log("Archiving course ID: $courseID, User ID: $userID");

            if ($this->model->archiveCourse($courseID, $userID)) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Failed to archive course.']);
            }
        }
    }
    public function editCourse(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user'])) {
                echo json_encode(['success' => false, 'message' => 'User not logged in.']);
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
                echo json_encode(['success' => false, 'message' => 'Failed to update course.']);
            }
        }
    }

    public function getCourseDetails(int $courseID): void
    {
        $course = $this->model->getCourseById($courseID);
        if ($course) {
            echo json_encode($course);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Course not found.']);
        }
    }

    public function showCourseDetails(int $courseID): void
    {
        $course = $this->model->getCourseById($courseID);

        if (!$course) {
            $this->sendError("Course not found.");
            return;
        }
        $isEnrolled = false;
        if (isset($_SESSION['user']) && $_SESSION['user']->getRole() === 'student') {
            $userID = $_SESSION['user']->getId();
            $isEnrolled = $this->model->isStudentEnrolled($courseID, $userID);
        }
        require_once __DIR__ . '/../views/courseDetails.php';
    }

    public function toggleCourseStatus(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['courseID']) || !isset($_POST['action'])) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Invalid request.']);
                return;
            }

            if (!isset($_SESSION['user'])) {
                http_response_code(401);
                echo json_encode(['success' => false, 'message' => 'User not logged in.']);
                return;
            }

            $courseID = (int)$_POST['courseID'];
            $action = $_POST['action'];
            $userID = $_SESSION['user']->getId();
            $newStatus = ($action === 'publish') ? 'published' : 'archived';
            if ($this->model->updateCourseStatus($courseID, $userID, $newStatus)) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Failed to update course status.']);
            }
        }
    }

    public function enroll(int $courseID): void
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'student') {
            error_log("User not logged in or not a student.");
            error_log("Session data: " . print_r($_SESSION, true));
            $_SESSION['enrollment_error'] = "You must be logged in as a student to enroll in a course.";
            header("Location: /course/$courseID");
            exit;
        }

        $userID = $_SESSION['user']->getId();
        error_log("User ID from session: $userID");

        if ($this->model->enrollStudent($courseID, $userID)) {
            $_SESSION['enrollment_success'] = "Enrolled successfully!";
            header("Location: /course/$courseID");
            exit;
        } else {
            $_SESSION['enrollment_error'] = "Failed to enroll in the course. You may already be enrolled.";
            header("Location: /course/$courseID");
            exit;
        }
    }
    public function myCourses(): void
    {
        error_log("Entering myCourses method.");

        if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'student') {
            error_log("User not logged in or not a student.");
            error_log("Session data: " . print_r($_SESSION, true));
            $this->sendError("You must be logged in as a student to view your courses.");
            return;
        }

        $userID = $_SESSION['user']->getId();
        error_log("User ID from session: $userID");
        $courses = $this->model->getEnrolledCourses($userID);
        error_log("Courses retrieved: " . print_r($courses, true));

        require_once __DIR__ . '/../views/myCourses.php';
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
