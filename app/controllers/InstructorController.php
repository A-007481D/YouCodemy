<?php

namespace App\controllers;

class InstructorController
{
    public function dashboard(): void {
       if(!isInstructor()){
          header("Location: /");
          exit;
       }
        require_once "app/views/instructorDashboard.php";
    }

//}

//    public function dashboard(): void {
//        if (!isInstructor()) {
//            dd($_SESSION['user']);
//        }
//        require_once "app/views/instructorDashboard.php";
//    }



}