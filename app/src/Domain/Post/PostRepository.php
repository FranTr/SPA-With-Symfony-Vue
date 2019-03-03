<?php

namespace App\Domain\Post;

interface PostRepository
{
    public function getAll(): array;
    public function save(Post $post);
}
