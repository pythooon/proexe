<?php

declare(strict_types=1);

namespace App\Service\Auth;

use App\Commons\QueryBus\QueryBus;
use App\Contract\Auth\LoginContract;
use App\Query\Auth\Login\Login;
use App\View\LoginView;

class AuthService
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function login(LoginContract $contract): LoginView
    {
        return $this->queryBus->handle(new Login($contract));
    }
}