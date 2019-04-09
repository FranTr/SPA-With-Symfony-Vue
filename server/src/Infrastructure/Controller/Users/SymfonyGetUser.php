<?php

namespace App\Infrastructure\Controller\Users;

use App\Application\User\Exceptions\UserInvalidCredentialsException;
use App\Application\User\Read\ReadUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use UserNotFoundException;

class SymfonyGetUser
{
    /** @var ReadUser */
    private $readUser;

    public function __construct(ReadUser $readUser)
    {
        $this->readUser = $readUser;
    }

    /**
     * @Route ("/security/login", methods="POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) :JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            $user = $this->readUser->getUser(
                $data['username'],
                $data['password']
            );
            return JsonResponse::fromJsonString(json_encode($user->getId()));
        } catch (UserNotFoundException
                | UserInvalidCredentialsException $exception) {
            return JsonResponse::fromJsonString($exception->getMessage(), $exception->getCode());
        }


    }
}
