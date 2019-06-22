<?php

namespace App\Infrastructure\Controller\Posts;

use App\Application\Post\DataTransformer\PostDataTransformer;
use App\Application\Post\Read\AllPosts;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
     *  @Route ("/api/posts", methods="POST")
     */
    public function __invoke(Request $request) :JsonResponse
    {
        $token = $request->server->get('REDIRECT_HTTP_AUTHORIZATION');
        $posts = $this->readAllPost->getAll();
        $this->postDataTransformer->write(...$posts);
        return JsonResponse::fromJsonString($this->postDataTransformer->read());
    }
}