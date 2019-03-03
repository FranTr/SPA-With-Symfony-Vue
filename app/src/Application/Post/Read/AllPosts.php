<?php

namespace App\Application\Post\Read;

use App\Application\Post\Responses\Post as PostResponse;
use App\Domain\Post\Post;
use App\Domain\Post\PostRepository;

class AllPosts
{
    /** @var PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll(): array
    {
        return array_map("self::convertToDto", $this->postRepository->getAll());
    }

    private function convertToDto(Post $post)
    {
        return new PostResponse(
            $post->getId(),
            $post->getString(),
            $post->getCreated(),
            $post->getUpdated()
        );
    }
}
