<?php

declare(strict_types=1);

namespace App\Strategy\LoginStrategy;

use App\Adapter\ExternalService\Bar\BarAdapter;
use App\Adapter\ExternalService\LoginAdapter;
use App\ValueObject\UserLogin;
use InvalidArgumentException;

class LoginBarStrategy implements LoginStrategy
{
    private UserLogin $userLogin;

    public function __construct(UserLogin $userLogin)
    {
        $this->userLogin = $userLogin;
    }

    public function login(LoginAdapter $loginAdapter): bool
    {
        /** no generics :( */
        if (!$loginAdapter instanceof BarAdapter) {
            throw new InvalidArgumentException('Invalid adapter');
        }

        return $loginAdapter->login($this->userLogin);
    }
}