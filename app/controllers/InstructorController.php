<?php

namespace App\controllers;

class InstructorController
{
    public function dahsboard(): void {
        session_start();
        if(!isset($_SESSION['user']) || empty($_SESSION['user']['role'] !== 'instructor')) {
            header('Location: /');
            exit;
        }
        require_once "app/views/instructorDashboard.php";
    }
}