<?php

namespace App\Domain\Muscle;

class Muscle
{
    /** @var */
    private $name;
    /** @var string */
    private $uuid;

    public function __construct(string $uuid, string $name)
    {
        $this->setName($name);
        $this->setUuid($uuid);
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}