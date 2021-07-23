<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService\Bar;

use App\Exceptions\ExternalServiceNotFoundException;
use App\ValueObject\UserLogin;
use External\Bar\Auth\LoginService;
use External\Bar\Exceptions\ServiceUnavailableException;
use External\Bar\Movies\MovieService;

class BarAdapterImpl implements BarAdapter
{
    private LoginService $loginService;
    private MovieService $movieService;

    public function __construct(LoginService $loginService, MovieService $movieService)
    {
        $this->loginService = $loginService;
        $this->movieService = $movieService;
    }

    public function login(UserLogin $userLogin): bool
    {
        return $this->loginService->login($userLogin->getUserName(), $userLogin->getPassword());
    }

    public function getTitles(): array
    {
        $moviesTitles = [];
        try {
            $movies = $this->movieService->getTitles();
            if (array_key_exists('titles', $movies)) {
                 foreach($movies['titles'] as $movie) {
                     $moviesTitles[] = $movie['title'];
                 }
            }
            return $moviesTitles;
        } catch (ServiceUnavailableException $e) {
            throw new ExternalServiceNotFoundException('External service Bar not found');
        }
    }
}