<?php

namespace App\models;

use App\entities\Cours;
use App\entities\TextCourse;
use App\entities\User;
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

    /**
     * @throws \Exception
     */
    public function getCourses($limit = 8, $offset = 0): array {
        $limit = (int)$limit;
        $offset = (int)$offset;
        $sql = "SELECT courses.*, users.first_name, users.last_name, categories.category_name 
            FROM courses 
            INNER JOIN users ON courses.userID = users.userID 
            INNER JOIN categories ON courses.categoryID = categories.categoryID 
            LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $courses = [];
        foreach ($results as $row) {
            $publisher = new User(
                $row['userID'],
                $row['first_name'],
                $row['last_name']
            );
            $tags = !empty($row['tags']) ? explode(',', $row['tags']) : [];
            if ($row['content_type'] === 'video') {
                $course = new VideoCourse(
                    $row['courseID'],
                    $row['title'],
                    $row['description'],
                    $row['content_type'],
                    $row['content_path'],
                    $row['category_name'],
                    $publisher,
                    $tags
                );
            } elseif ($row['content_type'] === 'text') {
                $course = new TextCourse(
                    $row['courseID'],
                    $row['title'],
                    $row['description'],
                    $row['content_type'],
                    $row['content_path'],
                    $row['category_name'],
                    $publisher,
                    $tags
                );
            } else {
                throw new \Exception("Unknown course type: " . $row['content_type']);
            }
            $courses[] = $course;
        }
        return $courses;
    }
    public function getTotalCourses(): int {
        $query = "SELECT COUNT(*) FROM courses";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchColumn();
    }


    public function getCoursesByInstructor(int $userID): array {
        $query = "SELECT courses.*, categories.category_name, users.first_name, users.last_name 
              FROM courses 
              JOIN categories ON courses.categoryID = categories.categoryID 
              JOIN users ON courses.userID = users.userID 
              WHERE courses.userID = :userID";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':userID' => $userID]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $courses = [];
        foreach ($results as $row) {
            $publisher = new User(
                $row['userID'],
                $row['first_name'],
                $row['last_name']
            );
            $tags = !empty($row['tags']) ? explode(',', $row['tags']) : [];
            if ($row['content_type'] === 'video') {
                $course = new VideoCourse(
                    $row['courseID'],
                    $row['title'],
                    $row['description'],
                    $row['content_type'],
                    $row['content_path'],
                    $row['category_name'],
                    $publisher,
                    $tags
                );
            } elseif ($row['content_type'] === 'text') {
                $course = new TextCourse(
                    $row['courseID'],
                    $row['title'],
                    $row['description'],
                    $row['content_type'],
                    $row['content_path'],
                    $row['category_name'],
                    $publisher,
                    $tags
                );
            } else {
                throw new \Exception("Unknown course type: " . $row['content_type']);
            }

            $courses[] = $course;
        }

        return $courses;
    }

    public function archiveCourse(int $courseID): bool
    {
        $query = "UPDATE courses SET is_archived = 1 WHERE courseID = :courseID";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':courseID' => $courseID]);
    }

    public function updateCourse(int $courseID, array $data): bool
    {
        $query = "UPDATE courses SET title = :title, description = :description, categoryID = :categoryID, tags = :tags WHERE courseID = :courseID";
        $stmt = $this->pdo->prepare($query);

        $tags = implode(',', $data['tags']);
        return $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':categoryID' => $data['categoryID'],
            ':tags' => $tags,
            ':courseID' => $courseID,
        ]);
    }

    public function getCourseById(int $courseID): ?array
    {
        $query = "SELECT * FROM courses WHERE courseID = :courseID";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':courseID' => $courseID]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getCategoryName(int $categoryID): string {
        $query = "SELECT category_name FROM categories WHERE categoryID = :categoryID";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':categoryID' => $categoryID]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['category_name'] ?? 'Uncategorized';
    }
}