<?php

namespace App\Domain\User\Exceptions;

use InvalidArgumentException;

class EmptyUserMandatoryFieldsException extends InvalidArgumentException
{
    const MESSAGE = 'Fill all the required fields';
}
