<?php

declare(strict_types=1);

namespace App\Contract\Auth;

interface LoginContract
{
    public function getLogin(): string;
    public function getPassword(): string;
}