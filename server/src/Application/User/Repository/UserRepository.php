<?php

namespace App\Application\User\Repository;

use App\Domain\User\User;

interface UserRepository
{
    public function findOneByUsername(string $username): ?User;
    public function findOneByUuid(string $uuid): ?User;
    public function save(User $user): void;
    public function delete(User $user): void;
}
