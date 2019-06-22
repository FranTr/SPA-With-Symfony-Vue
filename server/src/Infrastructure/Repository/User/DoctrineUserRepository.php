<?php
namespace App\Infrastructure\Repository\User;

use App\Application\User\Repository\UserRepository;
use App\Domain\User\User;
use App\Domain\User\UserExistenceChecker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DoctrineUserRepository extends ServiceEntityRepository implements UserRepository, UserExistenceChecker
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findOneByUsername(string $username): ?User
    {
        return $this->findOneBy(['username' => $username]);
    }

    public function findOneByUuid(string $uuid): ?User
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }
    public function isThisUsernameUsed(string $username): bool
    {
        return count($this->findBy(['username' => $username])) > 0;
    }

    public function isThisEmailUsed(string $email): bool
    {
        return count($this->findBy(['email' => $email])) > 0;
    }

    public function save(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function delete(User $user): void
    {
        $this->_em->remove($user);
        $this->_em->flush();
    }
}