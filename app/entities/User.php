<?php

namespace App\entities;

class User {

    private int $id;
    private string $F_name;
    private string $L_name;
    private string $email;
    private string $password;
    protected string $role;
    private string $accountStatus = 'active';

    public function __construct(string $F_name, string $L_name, string $email, $password = "") {
        $this->F_name = $F_name;
        $this->L_name = $L_name;
        $this->email = $email;
        $this->password = $password;

    }

    public function getId(): int { return $this->id; }
    public function getFName(): string { return $this->F_name; }
    public function getLName(): string { return $this->L_name; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string { return $this->password; }
    public function getRole(): string { return $this->role; }
    public function getAccountStatus(): string {return $this->accountStatus; }

    // ------------------

    public function setFName(string $F_name): void { $this->F_name = $F_name; }
    public function setLName(string $L_name): void { $this->L_name = $L_name; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setPassword(string $password): void { $this->password = $password; }
    public function setRole(string $role): void { $this->role = $role; }
    public function setAccountStatus(string $status): void {$this->accountStatus = $status;}
    public function setId(int $id): void {$this->id = $id;}


}