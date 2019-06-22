<?php


namespace App\Infrastructure\Controller\Users;


use App\Application\User\Delete\DeleteUser;
use App\Application\User\Exceptions\UserNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyDeleteUser extends AbstractController
{
    /** @var DeleteUser */
    private $deleteUser;

    public function __construct(DeleteUser $deleteUser)
    {
        $this->deleteUser = $deleteUser;
    }

    /**
     * @Route("/users/delete/{uuid}", methods="POST")
     * @param string $uuid
     * @return JsonResponse
     */
    public function delete(string $uuid)
    {
        try {
            if(!$uuid) {
                throw new UserNotFoundException(
                    UserNotFoundException::NOT_FOUND_MESSAGE,
                    UserNotFoundException::NOT_FOUND_CODE)
                ;
            }
            $this->deleteUser->delete($uuid);
            return JsonResponse::fromJsonString('User Deleted Successfully', Response::HTTP_ACCEPTED);
        } catch (UserNotFoundException $exception) {
            return JsonResponse::fromJsonString($exception->getMessage(), $exception->getCode());
        }
    }
}