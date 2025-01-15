<?php
namespace App\models;

use App\entities\User;
use App\config\Database;
use PDO;


class UserModel {
    private PDO $pdo;
    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function createUser(User $user): bool {
        $insert = "INSERT INTO users (firstName, lastName, email, password, role) VALUES(:first_name, :last_name, :email, :password, :role)";
        $stmt = $this->pdo->prepare($insert);
        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        return $stmt->execute();


    }



























} //endof
