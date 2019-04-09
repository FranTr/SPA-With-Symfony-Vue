<?php

namespace App\Application\User\QueryHandler;

use App\Application\User\Query\ReadUserQuery;
use App\Application\User\Repository\UserReadRepository;
use App\Domain\User\User;

class ReadUserQueryHandler
{
    /**
     * @var UserReadRepository
     */
    private $userReadRepository;

    public function __construct(UserReadRepository $userReadRepository)
    {
        $this->userReadRepository = $userReadRepository;
    }

    public function handle(ReadUserQuery $query): ?User
    {
        return $this->userReadRepository->findOne($query->getUsername());
    }
}
