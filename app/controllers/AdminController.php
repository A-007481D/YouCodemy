<?php

namespace App\controllers;

use App\entities\User;
use App\models\UserModel;

class AdminController
{
    public function dashboard(): void
    {
        if (!isAdmin()) {
            header("Location: /");
            exit;
        }

        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        require_once "app/views/adminDashboard.php";
    }

    public function manageUser(): void
    {
        if (!isAdmin()) {
            header("Location: /");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();

            $action = $_POST['action'];
            $userId = $_POST['userID'];

            switch ($action) {
                case 'activate': $userModel->updateStatus($userId, 'active');break;
                case 'suspend': $userModel->updateStatus($userId, 'suspended');break;
                case 'delete':$userModel->deleteUser($userId);break;
                default:
                    break;
            }

            header("Location: /admin/dashboard");
            exit;
        }
    }
}
