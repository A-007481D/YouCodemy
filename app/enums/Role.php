<?php
namespace App\enums;
enum Role : string {
    case ADMIN = 'admin';
    case STUDENT = 'student';
    case INSTRUCTOR = 'instructor';
}