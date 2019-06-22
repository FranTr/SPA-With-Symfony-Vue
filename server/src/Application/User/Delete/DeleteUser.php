<?php

namespace App\Application\User\Delete;

use App\Application\User\Exceptions\UserNotFoundException;
use App\Application\User\Repository\UserRepository;

class DeleteUser
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function delete(string $uuid)
    {
        $user = $this->userRepository->findOneByUuid($uuid);
        if(!$user) {
            throw new UserNotFoundException(
                UserNotFoundException::NOT_FOUND_MESSAGE,
                UserNotFoundException::NOT_FOUND_CODE
            );
        }
        $this->userRepository->delete($user);
    }
}
