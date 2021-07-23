<?php

declare(strict_types=1);

namespace App\ValueObject;

use App\Exceptions\Auth\InvalidUserLoginPrefixException;

class UserLogin
{
    private string $userName;

    private string $password;

    private ExternalService $externalService;

    public function __construct(string $value, string $password)
    {
        $this->userName = $value;
        $this->password = $password;
        $this->externalService = ExternalService::fromString(substr($value, 0, 4));
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getExternalService(): ExternalService
    {
        return $this->externalService;
    }
}