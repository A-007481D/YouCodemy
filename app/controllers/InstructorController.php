<?php

namespace App\controllers;

class InstructorController
{
    public function dahsboard(): void {
       if(!isInstructor()){
          header("location: /");
       }
        require_once "app/views/instructorDashboard.php";
    }
}