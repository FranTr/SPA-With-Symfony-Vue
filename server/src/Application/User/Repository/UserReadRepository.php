<?php

namespace App\Application\User\Repository;

use App\Domain\User\User;

interface UserReadRepository
{
    public function findOne(string $username): ?User;
}
