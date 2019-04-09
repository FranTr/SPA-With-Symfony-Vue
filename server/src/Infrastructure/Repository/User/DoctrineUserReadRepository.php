<?php
namespace App\Infrastructure\Repository\User;

use App\Application\User\Repository\UserReadRepository;
use App\Domain\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DoctrineUserReadRepository extends ServiceEntityRepository implements UserReadRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findOne(string $username): ?User
    {
        return $this->findOneBy(array('username' => $username));
    }
}