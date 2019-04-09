<?php

class UserNotFoundException extends Exception
{
    public const NOT_FOUND_MESSAGE = "User not found";
    public const NOT_FOUND_CODE = 401;
}
