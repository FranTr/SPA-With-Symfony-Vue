<?php


namespace App\Infrastructure\Controller\Users;

use App\Application\User\Exceptions\UserNotFoundException;
use App\Application\User\Update\UpdateUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyUpdateUser extends AbstractController
{
    private $updateUser;

    public function __construct(UpdateUser $updateUser)
    {
        $this->updateUser = $updateUser;
    }

    /**
     * @Route("/users/update/{id}", methods="POST")
     * @param Request $request
     * @param string|null $id
     * @return JsonResponse
     */
    public function __invoke(Request $request, ?string $id): JsonResponse
    {
        try {
            if(!$id) {
                throw new UserNotFoundException(
                    UserNotFoundException::NOT_FOUND_MESSAGE,
                    UserNotFoundException::NOT_FOUND_CODE
                );
            }
            $content = json_decode($request->getContent(), true);
            $password = $content['password'];
            $email = $content['email'];

            $this->updateUser->update($id, $password, $email);

            return JsonResponse::fromJsonString(sprintf('Updated', $id));
        } catch (UserNotFoundException
                | NotFoundHttpException $exception) {
            return JsonResponse::fromJsonString($exception->getMessage(), $exception->getCode());

        }
    }
}
