<?php

namespace App\Infrastructure\Controller\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Created by PhpStorm.
 * User: ward0g
 * Date: 16/03/19
 * Time: 13:50
 */

class SymfonySecurityLogin
{
    /**
     * @Route ("/api/security/login", methods="GET")
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) :JsonResponse
    {
        return JsonResponse::fromJsonString(json_encode(['role' => 'ROLE_FOO']));
    }
}
