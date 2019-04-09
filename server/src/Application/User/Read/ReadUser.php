<?php
namespace App\Application\User\Read;

use App\Application\Encoder\UserEncoder;
use App\Application\User\Exceptions\UserInvalidCredentialsException;
use App\Domain\User\User;
use App\Application\User\Query\ReadUserQuery;
use App\Application\User\QueryHandler\ReadUserQueryHandler;
use UserNotFoundException;

class ReadUser
{
    /** @var ReadUserQueryHandler */
    private $readUserQueryHandler;
    /** @var UserEncoder */
    private $userEncoder;

    public function __construct(ReadUserQueryHandler $readUserQueryHandler, UserEncoder $userEncoder)
    {
        $this->readUserQueryHandler = $readUserQueryHandler;
        $this->userEncoder = $userEncoder;
    }

    /**
     * @throws UserNotFoundException
     */
    public function getUser(string $username = null, string $password = null): User
    {
        $this->guardAgainstEmptyValues($username, $password);
        $readUserQuery = new ReadUserQuery($username, $password);
        $user = $this->readUserQueryHandler->handle($readUserQuery);
        $this->guardAgainstNonExistingUser($user);
        $this->guardAgainstInvalidCredentials($user->getPassword(), $password);

        return $user;
    }

    public function guardAgainstEmptyValues(string $username = null, string $password = null)
    {
        if(!$username || !$password) {
            throw new UserInvalidCredentialsException(
                UserInvalidCredentialsException::INVALID_PASSWORD_MESSAGE,
                UserInvalidCredentialsException::INVALID_PASSWORD_CODE
            );
        }
    }
    /**
     * @throws UserNotFoundException
     */
    public function guardAgainstNonExistingUser(User $user = null): void
    {
        if(!$user) {
            throw new UserNotFoundException(
                UserNotFoundException::NOT_FOUND_MESSAGE,
                UserNotFoundException::NOT_FOUND_CODE
            );
        }
    }

    public function guardAgainstInvalidCredentials(string $userPassword, string $password): void
    {
        if(!$this->userEncoder->decode($userPassword) == $password) {
            throw new UserInvalidCredentialsException(
                UserInvalidCredentialsException::INVALID_PASSWORD_MESSAGE,
                UserInvalidCredentialsException::INVALID_PASSWORD_CODE
            );
        }
    }
}
