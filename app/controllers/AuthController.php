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
            echo "please fill in all fields";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "invalid email";
            return;
        }

        if ($role === 'student') {
            $user = new Student($firstName, $lastName, $email, $password);
            $user->setRole('student');
            $registered = $this->userModel->createUser($user);

        } elseif ($role === 'instructor') {
            $user = new Instructor($firstName, $lastName, $email, $password);
            $user->setApproved(false);
            $registered = $this->userModel->createUser($user);
        } else {
            echo "invalid role";
            return;
        }
        if ($registered) {
            echo "registeration successful. please wait for your account to be approved!";
        } else {
            echo "registeration failed. please try again later!";
        }

    }


    public function login(): void
    {
        $email = trim($_POST['email_login']);
        $password = trim($_POST['password_login']);
        if (empty($email) || empty($password)) {
            echo "please fill in all fields";
            return;
        }

        $user = $this->userModel->findByEmail($email);
        if (!$user) {
            echo "user with this email does not exist";
            return;
        }
        if (!password_verify($password, $user->password)) {
            echo "invalid password";
            return;
        }

        session_start();
        $_SESSION['user'] = [
            'id' => $user->id,
            'F_name' => $user->F_name,
            'L_name' => $user->L_name,
            'email' => $user->email,
            'role' => $user->role

        ];

        echo "login successful.";
    }
}