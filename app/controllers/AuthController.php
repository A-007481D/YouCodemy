<?php

namespace App\controllers;
use App\entities\Instructor;
use App\entities\Student;
use App\models\interfaces\IUserModel;
use App\models\UserModel;

class AuthController
{
    private IUserModel $userModel;

    public function __construct()
    {
            $this->userModel = new UserModel();
    }

    public function signup(): void
    {
        $firstName = trim($_POST['F_name']);
        $lastName = trim($_POST['L_name']);
        $email = trim($_POST['email_reg']);
        $role = trim($_POST['role']);
        $password = password_hash($_POST['password_reg'], PASSWORD_BCRYPT);

        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($role)) {
            echo "all fields are required";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "invalid email formal.";
            return;
        }

        if ($role === 'student') {
            $user = new Student($firstName, $lastName, $email, $password);
            $user->setRole('student');
            $user->setAccountStatus('active');
            $registered = $this->userModel->createUser($user);

        } elseif ($role === 'instructor') {
            $user = new Instructor($firstName, $lastName, $email, $password);
            $user->setRole('instructor');
            $user->setAccountStatus('pending');
            $registered = $this->userModel->createUser($user);
        } else {
            echo "invalid role.";
            return;
        }

        if ($registered) {
            if ($role === 'instructor') {
                echo "your account is awaaiting approval, Please wait for admin approval.";
            } else {
                echo "registration successful";
            }
        } else {
            echo "registration failed. try again later.";
        }
    }


    public function login(): void
    {
        $email = trim($_POST['email_login']);
        $password = trim($_POST['password_login']);

        if (empty($email) || empty($password)) {
            echo "Please fill in all fields.";
            return;
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            echo "User not found with this email.";
            return;
        }

        if (!password_verify($password, $user->getPassword())) {
            echo "Invalid password.";
            return;
        }

        if ($user->getRole() === 'instructor' && $user->getAccountStatus() === 'pending') {
            echo "Your account is pending approval. Please wait for admin approval.";
            return;
        }

        if ($user->getAccountStatus() === 'suspended') {
            echo "Your account has been suspended. Please contact support.";
            return;
        }

        $_SESSION['user'] = $user; // Storing the User object in the session

        // Use object methods to access properties
        switch ($_SESSION['user']->getRole()) {
            case 'student':
                header('Location: /home');
                break;
            case 'instructor':
                header('Location: /instructorDashboard.php');
                break;
            case 'admin':
                header('Location: /adminDashboard.php');
                break;
            default:
                echo "Unknown role.";
        }

        exit;
    }


    public function logout(): void {
        session_start();
        session_destroy();
        header('Location: /');
    }


}