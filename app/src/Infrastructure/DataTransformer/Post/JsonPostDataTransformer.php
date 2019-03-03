<?php

namespace App\Infrastructure\DataTransformer\Post;

use App\Application\Post\DataTransformer\PostDataTransformer;
use App\Application\Post\Responses\Post;

class JsonPostDataTransformer implements PostDataTransformer
{
    private $data;

    public function write(Post ...$posts)
    {
        $this->data = [];
        foreach ($posts as $post) {
            $this->data[] = [
                "id" => $post->getId(),
                "string" => $post->getString(),
                "createdDate" => $post->getCreatedDate(),
                "updatedDate" => $post->getUpdatedDate()
            ];
        }
        $this->data = json_encode($this->data);
    }

    public function read()
    {
        return $this->data;
    }
}