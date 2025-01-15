<?php

namespace App\entities;

class Instructor  extends User{
    private bool $approved;
    public function __construct(string $F_name, string $L_name, string $email, string $password, bool $approved = false){
        parent::__construct($F_name, $L_name, $email, $password);
        $this->approved = $approved;
        $this->role = "instructor";
    }

    public function isApproved(): bool {return $this->approved; }
    public function setApproved(bool $approved): void {$this->approved = $approved; }


}