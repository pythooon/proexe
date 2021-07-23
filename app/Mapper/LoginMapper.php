<?php

declare(strict_types=1);

namespace App\Mapper;

use App\ValueObject\Status;
use App\ValueObject\UserLogin;
use App\View\LoginView;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class LoginMapper
{
    public function map(bool $data, ?UserLogin $userLogin = null): LoginView
    {
        if (!($data || $userLogin)) {
            return new LoginView(Status::failure());
        }
        $payload = JWTFactory::make(
            [
                'login' => $userLogin->getUserName(),
                'password' => $userLogin->getPassword(),
                'external_service' => $userLogin->getExternalService()
            ]
        );
        $token = JWTAuth::encode($payload);
        $loginView = new LoginView(Status::success());
        $loginView->setToken((string) $token);

        return $loginView;
    }
}