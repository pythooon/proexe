<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Service\Auth\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $service): JsonResponse
    {
        $data = $service->login($request)->serialize();
        if ($data['status'] === 'failure') {
            return new JsonResponse($data, 400);
        }
        return new JsonResponse($data, 200);
    }
}
