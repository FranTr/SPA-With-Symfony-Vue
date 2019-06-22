<?php

namespace App\Infrastructure\Controller\Muscles;

use App\Application\Muscle\Create\CreateMuscle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyImportMuscles extends AbstractController
{
    private $createMuscle;

    public function __construct(CreateMuscle $createMuscle)
    {
        $this->createMuscle = $createMuscle;
    }

    /**
     * @Route("/muscles/import", methods="POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $musclesData = json_decode($request->getContent(), true);
        foreach ($musclesData as $muscleData) {
            $this->createMuscle->create($muscleData['fields']['name']);
        }
        return new JsonResponse('Muscles created', Response::HTTP_ACCEPTED);
    }
}
