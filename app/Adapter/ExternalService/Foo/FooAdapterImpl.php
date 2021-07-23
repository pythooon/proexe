<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService\Foo;

use App\Exceptions\Auth\LoginException;
use App\Exceptions\ExternalServiceNotFoundException;
use App\ValueObject\UserLogin;
use External\Foo\Auth\AuthWS;
use External\Foo\Exceptions\AuthenticationFailedException;
use External\Foo\Exceptions\ServiceUnavailableException;
use External\Foo\Movies\MovieService;

class FooAdapterImpl implements FooAdapter
{
    private AuthWS $authWS;
    private MovieService $movieService;

    public function __construct(AuthWS $authWS, MovieService $movieService)
    {
        $this->authWS = $authWS;
        $this->movieService = $movieService;
    }

    public function login(UserLogin $userLogin): bool
    {
        try {
            $this->authWS->authenticate($userLogin->getUserName(), $userLogin->getPassword());
        } catch (AuthenticationFailedException $e) {
            throw new LoginException('Invalid username or password');
        }

        return true;
    }

    public function getTitles(): array
    {
        try {
            return $this->movieService->getTitles();
        } catch (ServiceUnavailableException $e) {
            throw new ExternalServiceNotFoundException('External service Foo not found');
        }
    }
}