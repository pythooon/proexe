<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\ExternalServiceNotFoundException;
use App\Service\Movies\MovieService;
use App\ValueObject\Status;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    public function getTitles(MovieService $service, int $tries = 0): JsonResponse
    {
        try {
            $response = new JsonResponse($service->getTitles(), 200);
        } catch (ExternalServiceNotFoundException $e) {
            $response = $this->getTitles($service, $tries++);
            if ($tries > 10) {
                return new JsonResponse(['status' => (string) Status::failure()], 400);
            }
        }

        return $response;
    }
}
