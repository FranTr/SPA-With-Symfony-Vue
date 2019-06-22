<?php
namespace App\Domain\User;

use DateTime;
use Exception;

class User
{
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    /** @var string */
    private $uuid;
    /** @var string */
    private $username;
    /** @var string */
    private $password;
    /** @var array */
    private $roles;
    /** @var string */
    private $createdDate;
    /** @var string */
    private $updatedDate;
    /**
     * @var string
     */
    private $email;

    /**
     * User constructor.
     * @param string $uuid
     * @param string $username
     * @param string $password
     * @param string $email
     * @param array|null $roles
     */
    public function __construct(
        string $uuid,
        string $username,
        string $password,
        string $email,
        array $roles = null
    ) {
        $this->setUuid($uuid);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setRoles($roles);
        $this->setCreatedDate();
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function setCreatedDate(): void
    {
        $this->createdDate = new DateTime();
    }

    public function setUpdatedDate(string $updatedDate): void
    {
        $this->updatedDate = $updatedDate;
    }
    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles() :?array
    {
        return $this->roles;
    }

    /**
     * @throws Exception
     */
    public function getCreatedDate(): DateTime
    {
        return new DateTime($this->createdDate);
    }

    /**
     * @throws Exception
     */
    public function getUpdatedDate(): DateTime
    {
        return new DateTime($this->updatedDate);
    }

}
