<?php

namespace App\Domain\User\Exceptions;

use Exception;

class UserExistsException extends Exception
{
 const EMAIL_MESSAGE = 'the email selected is already in use';
 const USERNAME_MESSAGE = 'the username selected is already in use';
}
