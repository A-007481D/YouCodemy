<?php

namespace App\Entities;

class User {

    private int $id;
    private string $F_name;
    private string $L_name;
    private string $email;
    private string $password;
    private string $role;
    public function __construct(int $id, string $F_name, string $L_name, string $email, string $password) {

    }

}