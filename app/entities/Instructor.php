<?php

namespace App\entities;

class Instructor  extends User{
    private bool $approved;
    private string $accountStatus = 'active';

    public function __construct(string $firstName, string $lastName, string $email, string $password, bool $approved = false) {
        parent::__construct($firstName, $lastName, $email, $password);
        $this->setRole('instructor');
        $this->setAccountStatus('pending');
    }

    public function isApproved(): bool {
        return $this->approved;
    }

    public function setApproved(bool $approved): void {
        $this->approved = $approved;
    }
}