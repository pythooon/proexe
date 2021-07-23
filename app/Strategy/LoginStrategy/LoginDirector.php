<?php

declare(strict_types=1);

namespace App\Strategy\LoginStrategy;

use App\Exceptions\Auth\InvalidExternalServiceException;
use App\ValueObject\ExternalService;
use App\ValueObject\UserLogin;

class LoginDirector
{
    public function doLogin(UserLogin $userLogin): bool
    {
        $externalService = $userLogin->getExternalService();

        switch ($externalService) {
            case $externalService->equals(ExternalService::FOO):
                $strategy = new LoginFooStrategy($userLogin);
                break;
            case  $externalService->equals(ExternalService::BAR):
                $strategy = new LoginBarStrategy($userLogin);
                break;
            case  $externalService->equals(ExternalService::BAZ):
                $strategy = new LoginBazStrategy($userLogin);
                break;
            default:
                throw new InvalidExternalServiceException('Invalid external service');
        }

        $context = new LoginContext($strategy);

        return $context->doLogin();
    }
}