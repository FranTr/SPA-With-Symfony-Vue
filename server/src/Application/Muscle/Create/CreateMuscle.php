<?php

namespace App\Application\Muscle\Create;

use App\Application\Muscle\Repository\MuscleRepository;
use App\Domain\Muscle\MuscleFactory;

class CreateMuscle
{
    /**
     * @var MuscleRepository
     */
    private $muscleRepository;
    /**
     * @var MuscleFactory
     */
    private $muscleFactory;

    public function __construct(MuscleRepository $muscleRepository, MuscleFactory $muscleFactory)
    {
        $this->muscleRepository = $muscleRepository;
        $this->muscleFactory = $muscleFactory;
    }

    public function create(string $muscleName)
    {
        $muscle = $this->muscleFactory->createObject($muscleName);
        $this->muscleRepository->save($muscle);
    }
}
