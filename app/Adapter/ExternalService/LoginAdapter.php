<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService;

use App\ValueObject\UserLogin;

interface LoginAdapter
{
    public function login(UserLogin $userLogin): bool;
}