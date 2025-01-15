<?php

namespace App\controllers;

class AdminController
{
    public function dashboard(): void {
    if(!isAdmin()) {
        header("Location: /");
    }
    require_once "app/views/adminDashboard.php";

    }
}