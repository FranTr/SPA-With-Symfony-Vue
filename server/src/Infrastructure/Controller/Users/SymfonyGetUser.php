<?php

namespace App\Infrastructure\Controller\Users;

use App\Application\User\Exceptions\UserInvalidCredentialsException;
use App\Application\User\Exceptions\UserNotFoundException;
use App\Application\User\Read\ReadUser;
use Namshi\JOSE\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyGetUser extends AbstractController
{
    /** @var ReadUser */
    private $readUser;

    public function __construct(ReadUser $readUser)
    {
        $this->readUser = $readUser;
    }

    /**
     * @Route ("/login", methods="POST")
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
                $encoder = new JWT(
                    [
                        'username' => $user->getUsername(),
                        'exp' => time() + 1296000],
                    [
                        'alg' => 'HS256',
                        'typ' => "JWT"
                    ]
                );
                $token = $encoder->generateSigninInput();
                return JsonResponse::fromJsonString('Bearer ' . json_encode($token));
        } catch (UserNotFoundException
                | UserInvalidCredentialsException $exception) {
            return JsonResponse::fromJsonString($exception->getMessage(), $exception->getCode());
        }
    }
}
