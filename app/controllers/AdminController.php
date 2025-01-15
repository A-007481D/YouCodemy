<?php

namespace App\controllers;

class AdminController
{
    public function dashboard(): void {
        session_start();
        if(!isset($_SESSION['user']) || empty($_SESSION['user']['role'] !== 'admin')) {
            header('Location: /');
            exit;
        }
        require_once "app/views/adminDashboard.php";
    }
}