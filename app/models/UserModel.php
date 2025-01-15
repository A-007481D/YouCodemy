<?php

namespace App\models;

use App\entities\User;
use App\config\Database;
use App\models\interfaces\IUserModel;
use PDO;


class UserModel implements IUserModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function createUser(User $user): bool
    {
        $firstName = $user->getFName();
        $lastName = $user->getLName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $role = $user->getRole();
        $accountStatus = $user->getAccountStatus();

        $insert = "INSERT INTO users (first_name, last_name, email, password, role, account_status) 
               VALUES(:first_name, :last_name, :email, :password, :role, :account_status)";
        $stmt = $this->pdo->prepare($insert);
        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':account_status', $accountStatus, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function findByEmail(string $email): ?User
    {


        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(
            ["email" => $email]
        );
        $res =  $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

        return  new User($res["first_name"] , $res["last_name"] , $res["email"] , "");
    }

}
