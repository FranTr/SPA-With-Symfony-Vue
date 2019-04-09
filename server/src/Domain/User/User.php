<?php
namespace App\Domain\User;

use DateTime;
use Exception;

class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $uuid;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var array */
    private $roles;

    /** @var string */
    private $created;

    /** @var string */
    private $updated;

    public function __construct(
        int $id,
        string $uuid,
        string $username,
        string $password,
        array $roles = null,
        string $created,
        string $updated
    ) {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
        $this->created = $created;
        $this->updated = $updated;
    }

    public function getId(): int
    {
        return $this->id;
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
    public function getCreated(): DateTime
    {
        return new DateTime($this->created);
    }

    /**
     * @throws Exception
     */
    public function getUpdated(): DateTime
    {
        return new DateTime($this->updated);
    }
}
