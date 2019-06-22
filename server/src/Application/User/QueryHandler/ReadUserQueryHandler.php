<?php

namespace App\Application\User\QueryHandler;

use App\Application\User\Query\ReadUserQuery;
use App\Application\User\Repository\UserRepository;
use App\Domain\User\User;

class ReadUserQueryHandler
{
    /**
     * @var UserRepository
     */
    private $userReadRepository;

    public function __construct(UserRepository $userReadRepository)
    {
        $this->userReadRepository = $userReadRepository;
    }

    public function handle(ReadUserQuery $query): ?User
    {
        return $this->userReadRepository->findOneByUsername($query->getUsername());
    }
}
