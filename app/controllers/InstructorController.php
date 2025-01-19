<?php

namespace App\controllers;

use App\models\CourseModel;

class InstructorController
{
    private CourseModel $courseModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
    }

    public function dashboard(): void
    {
        if(!isInstructor()){
            header("Location: /");
            exit;
        }
        $userID = $_SESSION['user']->getId();
        $courses = $this->courseModel->getCoursesByInstructor($userID);
        require_once "app/views/instructorDashboard.php";
    }

    public function archiveCourse(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseID = (int)$_POST['courseID'];
            if ($this->courseModel->archiveCourse($courseID)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to archive course']);
            }
        }
    }

    public function editCourse(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseID = (int)$_POST['courseID'];
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'categoryID' => (int)$_POST['categoryID'],
                'tags' => explode(',', trim($_POST['tags'])),
            ];

            if ($this->courseModel->updateCourse($courseID, $data)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update course']);
            }
        }
    }

    public function getCourseDetails(int $courseID): void
    {
        $course = $this->courseModel->getCourseById($courseID);
        if ($course) {
            echo json_encode($course);
        } else {
            echo json_encode(['success' => false, 'message' => 'Course not found']);
        }
    }
}