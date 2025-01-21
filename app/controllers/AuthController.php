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
            $this->sendError("All fields are required");
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->sendError("Invalid email format");
            return;
        }

        $existingUser = $this->userModel->findByEmail($email);
        if ($existingUser) {
            $this->sendError("Email already exists");
            return;
        }

        $existingFName = $this->userModel->findByFirstName($firstName);
        if ($existingFName) {
            $this->sendError("First name already exists");
            return;
        }

        $existingLName = $this->userModel->findByLastName($lastName);
        if ($existingLName) {
            $this->sendError("Last name already exists");
        }

        $user = null;
        if ($role === 'student') {
            $user = new Student($firstName, $lastName, $email, $password);
            $user->setRole('student');
            $user->setAccountStatus('active');
        } elseif ($role === 'instructor') {
            $user = new Instructor($firstName, $lastName, $email, $password);
            $user->setRole('instructor');
            $user->setAccountStatus('pending');
        } else {
            $this->sendError("Invalid role");
            return;
        }

        $registered = $this->userModel->createUser($user);

        if ($registered) {
            $successMessage = ($role === 'instructor')
                ? "Registered successfully, Please wait for account approval!"
                : "Registered successfully!";

            if ($this->isHtmxRequest()) {
                echo $this->renderPartial($successMessage);
            } else {
                $_SESSION['signup_success'] = $successMessage;
                header("Location: /login");
            }
        } else {
            $this->sendError("Something went wrong, please try again later!");
        }
    }

    public function login(): void
    {
        $email = trim($_POST['email_login']);
        $password = trim($_POST['password_login']);

        if (empty($email) || empty($password)) {
            $this->sendError("Please fill in all fields.", 'login');
            return;
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            $this->sendError("User not found with this email.", 'login');
            return;
        }

        if (!password_verify($password, $user->getPassword())) {
            $this->sendError("Invalid password.", 'login');
            return;
        }

        if ($user->getRole() === 'instructor' && $user->getAccountStatus() === 'pending') {
            $this->sendError("Your account is awaiting approval, Please wait for admin approval.", 'login');
            return;
        }

        if ($user->getAccountStatus() === 'suspended') {
            $this->sendError("Your account has been suspended. Please contact support.", 'login');
            return;
        }

        $_SESSION['user'] = $user;

//        dd($_SESSION['user']);
        $redirectUrl = match ($user->getRole()) {
            'student' => '/home',
            'instructor' => '/instructor/dashboard',
            'admin' => '/admin/dashboard',
            default => '/',
        };

        if ($this->isHtmxRequest()) {
            header('HX-Redirect: ' . $redirectUrl);
        } else {
            header('Location: ' . $redirectUrl);
        }
        exit;
    }


    public function logout(): void {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /');
        exit;
    }

    private function sendError(string $message, string $form = 'signup'): void
    {
        if ($this->isHtmxRequest()) {
            echo "<div class='text-red-500 text-sm mt-2 text-center'>{$message}</div>";
        } else {
            $_SESSION[$form . '_error'] = $message;
            header("Location: /" . ($form === 'signup' ? 'signup' : 'login'));
        }
        exit;
    }

    private function isHtmxRequest(): bool
    {
        return isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true';
    }

    private function renderPartial(string $msg): string
    {
        return "<div class='text-red-500 text-sm mt-2 text-center'>{$msg}</div>";
    }
}
