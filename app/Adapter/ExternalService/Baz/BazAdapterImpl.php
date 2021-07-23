<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService\Baz;

use App\Exceptions\ExternalServiceNotFoundException;
use App\ValueObject\UserLogin;
use External\Baz\Auth\Authenticator;
use External\Baz\Auth\Responses\Success;
use External\Baz\Exceptions\ServiceUnavailableException;
use External\Baz\Movies\MovieService;

class BazAdapterImpl implements BazAdapter
{
    private Authenticator $authenticator;
    private MovieService $movieService;

    public function __construct(Authenticator $authenticator, MovieService $movieService)
    {
        $this->authenticator = $authenticator;
        $this->movieService = $movieService;
    }

    public function login(UserLogin $userLogin): bool
    {
        $status = $this->authenticator->auth($userLogin->getUserName(), $userLogin->getPassword());

        if ($status instanceof Success) {
            return true;
        }

        return false;
    }

    public function getTitles(): array
    {
        try {
            $movies = $this->movieService->getTitles();
            if (array_key_exists('titles', $movies)) {
                return $movies['titles'];
            }
        } catch (ServiceUnavailableException $e) {
            throw new ExternalServiceNotFoundException('External service Baz not found');
        }
    }
}