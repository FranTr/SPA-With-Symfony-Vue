<?php

namespace App\Infrastructure\Repository\Muscle;

use App\Application\Muscle\Repository\MuscleRepository;
use App\Domain\Muscle\Muscle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DoctrineMuscleRepository extends ServiceEntityRepository implements MuscleRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Muscle::class);
    }

    public function save(Muscle $muscle): void
    {
        $this->_em->persist($muscle);
        $this->_em->flush();
    }
}
