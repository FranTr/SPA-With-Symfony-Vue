<?php

namespace App\Application\Post\Responses;

class Post
{
    private $id;
    private $string;
    private $createdDate;
    private $updatedDate;

    public function __construct(int $id, string $string, string $createdDate, string $updatedDate)
    {
        $this->id = $id;
        $this->string = $string;
        $this->createdDate = $createdDate;
        $this->updatedDate = $updatedDate;
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
     * @return string
     */
    public function getCreatedDate(): string
    {
        return $this->createdDate;
    }

    /**
     * @return string
     */
    public function getUpdatedDate(): string
    {
        return $this->updatedDate;
    }
}
