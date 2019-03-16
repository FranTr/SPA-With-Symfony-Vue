<?php

namespace App\Infrastructure\Controller\Posts;

use App\Application\Post\DataTransformer\PostDataTransformer;
use App\Application\Post\Read\AllPosts;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyGetAllPosts
{
    /** @var AllPosts */
    private $readAllPost;

    /** @var PostDataTransformer */
    private $postDataTransformer;

    /**
     * @param $readAllPost
     * @param $postDataTransformer
     */
    public function __construct(AllPosts $readAllPost, PostDataTransformer $postDataTransformer)
    {
        $this->readAllPost = $readAllPost;
        $this->postDataTransformer = $postDataTransformer;
    }

    /**
     *  @Route ("/api/posts", methods="GET")
     */
    public function __invoke() :JsonResponse
    {
        $posts = $this->readAllPost->getAll();
        $this->postDataTransformer->write(...$posts);
        return JsonResponse::fromJsonString($this->postDataTransformer->read());
    }
}