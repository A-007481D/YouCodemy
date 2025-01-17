<?php

namespace App\Models;

use App\entities\Cours;
use App\entities\TextCourse;
use App\entities\VideoCourse;
use App\config\Database;
use PDO;

class CourseModel {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function addCourse(Cours $course, int $userID, int $categoryID): bool {
        $query = "INSERT INTO courses (title, description, content_type, content_path, tags, categoryID, userID) 
              VALUES (:title, :description, :content_type, :content_path, :tags, :categoryID, :userID)";
        $stmt = $this->pdo->prepare($query);

        $tags = implode(',', $course->getTags()); 
        return $stmt->execute([
            ':title' => $course->getTitle(),
            ':description' => $course->getDescription(),
            ':content_type' => $course->getContentType(),
            ':content_path' => $course->getContent(),
            ':tags' => $tags,
            ':categoryID' => $categoryID,
            ':userID' => $userID,
        ]);
    }

    public function getCourses(): array {
        $query = "SELECT * FROM courses";
        $stmt = $this->pdo->query($query);
        $courses = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tags = explode(',', $row['tags']); 
            if ($row['content_type'] === 'text') {
                $courses[] = new TextCourse($row['courseID'], $row['title'], $row['description'], $row['content_type'], $row['content_path'], $tags);
            } elseif ($row['content_type'] === 'video') {
                $courses[] = new VideoCourse($row['courseID'], $row['title'], $row['description'], $row['content_type'], $row['content_path'], $tags);
            }
        }
        return $courses;
    }
}