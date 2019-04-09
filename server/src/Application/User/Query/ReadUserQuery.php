<?php
namespace App\Application\User\Query;

class ReadUserQuery
{
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /** @return string */
    public function getPassword(): string
    {
        return $this->password;
    }

    /** @return string */
    public function getUsername(): string
    {
        return $this->username;
    }
}
