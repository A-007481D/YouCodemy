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
            $_SESSION['signup_error'] = "All fields are required";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['signup_error'] = "Invalid email format";
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
            $_SESSION['signup_error'] = "Invalid role";
            return;
        }

        if ($registered) {
            if ($role === 'instructor') {
                $_SESSION['signup_error'] = "Registered successfully, Please wait for account approval!";
            } else {
                $_SESSION['signup_error'] = "Registered successful";
            }
        } else {
            $_SESSION['signup_error'] = "Something went wrong, please try again later!";
        }
    }


    public function login(): void
    {
        $email = trim($_POST['email_login']);
        $password = trim($_POST['password_login']);

        if (empty($email) || empty($password)) {
            $_SESSION['login_error'] = "Please fill in all fields.";
//            header('Location: /');
            return;
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user) {
           $_SESSION['login_error'] = "User not found with this email.";
//           header('Location: /');
            return;
        }

        if (!password_verify($password, $user->getPassword())) {
            $_SESSION['login_error'] = "Invalid password.";
//            header('Location: /');
            return;
        }

        if ($user->getRole() === 'instructor' && $user->getAccountStatus() === 'pending') {
            $_SESSION['login_error'] = "Your account is awaiting approval, Please wait for admin approval.";
//            header("location: /");
            return;
        }

        if ($user->getAccountStatus() === 'suspended') {
            $_SESSION['login_error'] = "Your account has been suspended. Please contact support.";
//            header('Location: /');
            return;
        }

        $_SESSION['user'] = $user;
        header('Location: /');

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