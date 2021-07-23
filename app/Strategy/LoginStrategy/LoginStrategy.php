<?php

declare(strict_types=1);

namespace App\Strategy\LoginStrategy;

use App\Adapter\ExternalService\LoginAdapter;

interface LoginStrategy
{
    public function login(LoginAdapter $loginAdapter): bool;
}