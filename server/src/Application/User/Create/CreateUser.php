<?php

namespace App\Application\User\Create;

use App\Application\User\Repository\UserRepository;
use App\Domain\User\Exceptions\UserExistsException;
use \App\Domain\User\UserFactory;

class CreateUser
{
    private $userFactory;
    private $userRepository;

    public function __construct(UserFactory $userFactory, UserRepository $userRepository)
    {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
    }

    /**
     * @throws UserExistsException
     */
    public function create(string $username, string $password, string $email)
    {
        $userData = [
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'roles' => ['USER_ROLE']
        ];
        $this->userRepository->save($this->userFactory->createUserObject($userData));
    }
}