<?php

namespace App\Infrastructure\Repository\Post;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DoctrinePostRepository extends ServiceEntityRepository implements PostRepository
{
    /**
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /** @Return array */
    public function getAll(): array
    {
        return $this->findAll();
    }

    /**
     * @param Post $post
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Post $post)
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }
}
