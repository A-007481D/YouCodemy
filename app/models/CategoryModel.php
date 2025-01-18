<?php

namespace App\models;

use App\entities\Category;
use App\config\Database;
use PDO;

class CategoryModel {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllCategories(): array {
        $query = "SELECT * FROM categories";
        $stmt = $this->pdo->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach ($results as $row) {
            $categories[] = new Category($row['categoryID'], $row['category_name']);
        }

        return $categories;
    }
}