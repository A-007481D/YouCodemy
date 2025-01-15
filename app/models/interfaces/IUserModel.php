<?php
namespace App\models\interfaces;
use App\entities\User;

interface IUserModel
{
    function createUser(User $user): bool;

    function findByEmail(string $email): ?User;


//    function findById(int $id): ?User;
}