<?php

namespace App\Domain\Post;
use Carbon\Carbon;
use DateTime;

class Post
{

    /** @var int */
    private $id;

    /** @var string */
    private $string;

    /** @var Carbon */
    private $created;

    /** @var Carbon */
    private $updated;

    const DATETIME_FORMAT = "Y-m-d H:i:s";

    /**
     * @return void
     */
    public function setCreatedDate(): void
    {
        $this->created = Carbon::now();
    }

    /**
     * @return void
     */
    public function onUpdatedDate(): void
    {
        $this->updated = Carbon::now();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * @param string $string
     * @return void
     */
    public function setString(string $string): void
    {
        $this->string = $string;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created->format(self::DATETIME_FORMAT);
    }

    /**
     * @return DateTime|null
     */
    public function getUpdated(): ?string
    {
        return $this->updated->format(self::DATETIME_FORMAT);
    }
}
