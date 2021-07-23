<?php

declare(strict_types=1);

namespace App\Strategy\LoginStrategy;

use App\Adapter\ExternalService\Bar\BarAdapter;
use App\Adapter\ExternalService\Baz\BazAdapter;
use App\Adapter\ExternalService\Foo\FooAdapter;
use App\Adapter\ExternalService\LoginAdapter;
use App\Exceptions\Auth\InvalidExternalServiceException;

class LoginContext
{
    private LoginStrategy $strategy;
    private LoginAdapter $loginAdapter;

    public function __construct(LoginStrategy $strategy)
    {
        $this->strategy = $strategy;
        $this->createValidAdapter($strategy);
    }

    public function doLogin(): bool
    {
        return $this->strategy->login($this->loginAdapter);
    }

    /**
     * here if i had more time i wouldn't use ioc container
     */
    private function createValidAdapter(LoginStrategy $strategy): void
    {
        switch ($strategy) {
            case $strategy instanceof LoginFooStrategy:
                $this->loginAdapter = app()->make(FooAdapter::class);
                break;
            case $strategy instanceof LoginBarStrategy:
                $this->loginAdapter = app()->make(BarAdapter::class);
                break;
            case $strategy instanceof LoginBazStrategy:
                $this->loginAdapter = app()->make(BazAdapter::class);
                break;
            default:
                throw new InvalidExternalServiceException('Invalid strategy');
        }
    }
}