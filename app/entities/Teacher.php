<?php

namespace App\Entities;

class Teacher
{
    private int $id;
    private string $F_name;
    private string $L_name;
    private string $email;
    private string $password;
    public function __construct(int $id, string $F_name, string $L_name, string $email, string $password) {

    }
}