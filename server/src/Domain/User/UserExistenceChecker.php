<?php


namespace App\Domain\User;

interface UserExistenceChecker
{
    public function isThisUsernameUsed(string $username): bool;
    public function isThisEmailUsed(string $email): bool;
}