<?php

namespace App\controllers;
use App\entities\Instructor;
use App\entities\Student;
use App\models\UserModel;

class AuthController
{
    private UserModel $userModel;

    public function __construct(UserModel $userModel)
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
            echo "user not found with this email.";
            return;
        }

        if (!password_verify($password, $user['password'])) {
            echo "invalid password.";
            return;
        }

        if ($user['role'] === 'instructor' && $user['account_status'] === 'pending') {
            echo "Your account is pending approval, Please wait for admin approval.";
            return;
        }

        if ($user['account_status'] === 'suspended') {
            echo "Your account has been suspended, Please contact support.";
            return;
        }

        session_start();
        $_SESSION['user'] = [
            'id' => $user['userID'],
            'F_name' => $user['first_name'],
            'L_name' => $user['last_name'],
            'email' => $user['email'],
            'role' => $user['role']
        ];

        echo "login successful.";
    }
}