<?php

declare(strict_types=1);

namespace App\Query\Auth\Login;

use App\Commons\QueryBus\Query;
use App\Contract\Auth\LoginContract;

class Login implements Query
{
    private LoginContract $contract;

    public function __construct(LoginContract $contract)
    {
        $this->contract = $contract;
    }

    public function getContract(): LoginContract
    {
        return $this->contract;
    }
}