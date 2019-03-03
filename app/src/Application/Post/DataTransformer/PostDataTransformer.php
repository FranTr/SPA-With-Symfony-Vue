<?php

namespace App\Application\Post\DataTransformer;

use App\Application\Post\Responses\Post;

interface PostDataTransformer
{
    public function write(Post ...$posts);
    public function read();
}
