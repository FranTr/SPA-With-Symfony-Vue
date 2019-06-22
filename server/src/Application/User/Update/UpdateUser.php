<?php

namespace App\Application\User\Update;
use App\Application\User\Exceptions\UserNotFoundException;
use App\Application\User\Repository\UserRepository;

class UpdateUser
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function update(string $uuid, string $password, string $email)
    {
        $user = $this->userRepository->findOneByUuid($uuid);
        if(!$user) {
            throw new UserNotFoundException(
                UserNotFoundException::NOT_FOUND_MESSAGE,
                UserNotFoundException::NOT_FOUND_CODE
            );
        }
        if (!empty($email)) {
            $user->setEmail($email);
        }
        if (!empty($password)) {
            $user->setPassword($password);
        }
        $this->userRepository->save($user);
    }
}
