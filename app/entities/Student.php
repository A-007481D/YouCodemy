<?php


namespace App\entities;

class Student extends User{
    private array $enrolledCourses = [];
    public function __construct(string $F_name, string $L_name, string $email, string $password = null  ){
        parent::__construct($F_name,$L_name,$email,$password);
        $this->enrolledCourses =[];

    }

    public function getEnrolledCourses() : array{
        return $this->enrolledCourses;
    }
    public function setEnrolledCourses(array $enrolledCourses) : void{
        $this->enrolledCourses = $enrolledCourses;

    }
}