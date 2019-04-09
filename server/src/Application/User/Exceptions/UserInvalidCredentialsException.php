<?php

namespace App\Application\User\Exceptions;

use InvalidArgumentException;

class UserInvalidCredentialsException extends InvalidArgumentException
{
    public const INVALID_PASSWORD_MESSAGE = "Username or password are incorrect.";
    public const INVALID_PASSWORD_CODE = 403;
}
