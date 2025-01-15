<?php

namespace App\entities;

class Teacher extends User {
    private array $courses = [];
    public function __construct(string $F_name, string $L_name, string $email, string $password = null) {
        parent::__construct($F_name, $L_name, $email, $password);

    }
    public function getFirstName() : string {
        return $this->getFname();
    }

    public function getLastName() : string {
        return $this->getLname();
    }

//    public function getEmailT() : string {
//        return $this->getEmail();
//    }

    public function setFirstName(string $F_name) : void {
        $this->setFName($F_name);
    }

    public function setLastName(string $L_name) : void {
        $this->setLName($L_name);
    }

    public function geCourses() : array {
        return $this->courses;
    }

    public function setCourses(array $courses) : void {
        $this->courses = $courses;
    }






}