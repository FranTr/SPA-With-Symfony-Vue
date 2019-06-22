<?php

namespace App\Application\Muscle\Repository;

use App\Domain\Muscle\Muscle;

interface MuscleRepository
{
    public function save(Muscle $muscle): void;
}
