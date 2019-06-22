<?php

namespace App\Domain\User;

use App\Application\Generator\CodeGenerator;
use App\Domain\User\Exceptions\EmptyUserMandatoryFieldsException;
use App\Domain\User\Exceptions\UserExistsException;

class UserFactory
{
    /** @var CodeGenerator */
    private $codeGenerator;
    /** @var UserExistenceChecker */
    private $existenceChecker;

    public function __construct(CodeGenerator $codeGenerator, UserExistenceChecker $existenceChecker)
    {
        $this->codeGenerator = $codeGenerator;
        $this->existenceChecker = $existenceChecker;
    }

    /**
     * @throws UserExistsException
     */
    public function createUserObject(array $userData): User
    {
        $this->guardAgainstInvalidUserData($userData);
        $this->guardAgainstExistingEmail($userData['email']);
        $this->guardAgainstExistingUsername($userData['username']);
        return $this->createUser($userData);
    }

    public function createUser(array $userData)
    {
        return new User(
            $this->codeGenerator->generate(),
            $userData['username'],
            $userData['password'],
            $userData['email'],
            $userData['roles']
            );
    }

    /**
     * @throws UserExistsException
     */
    private function guardAgainstExistingEmail(string $email): void
    {
        if($this->existenceChecker->isThisEmailUsed($email)) {
            throw new UserExistsException(UserExistsException::EMAIL_MESSAGE);
        };
    }

    /**
     * @throws UserExistsException
     */
    private function guardAgainstExistingUsername(string $username): void
    {
        if($this->existenceChecker->isThisUsernameUsed($username)) {
            throw new UserExistsException(UserExistsException::USERNAME_MESSAGE);
        };
    }

    private function guardAgainstInvalidUserData(array $userData): void
    {
        if(empty($userData['username'])
        || empty($userData['email'])
        || empty($userData['password'])
        ) {
            throw new EmptyUserMandatoryFieldsException(EmptyUserMandatoryFieldsException::MESSAGE);
        }
    }
}

