<?php


namespace App\Infrastructure\Controller\Users;

use App\Application\User\Create\CreateUser;
use App\Domain\User\Exceptions\UserExistsException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyCreateUser extends AbstractController
{
    private $createUser;

    public function __construct(CreateUser $createUser)
    {
        $this->createUser = $createUser;
    }

    /**
     * @Route("/users/create", methods="POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];

        try {
            $this->createUser->create($username, $password, $email);
            return new JsonResponse('User created', Response::HTTP_ACCEPTED);
        } catch (UserExistsException $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
