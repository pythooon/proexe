<?php

declare(strict_types=1);

namespace Tests\Feature\Login;

class LoginTestData
{
    public function getValidDataForFooService(): array
    {
        return [
            'login' => 'FOO_test',
            'password' => $this->getValidPassword()
        ];
    }

    public function getInvalidDataForFooService(): array
    {
        return [
            'login' => 'Foo_test',
            'password' => $this->getValidPassword()
        ];
    }

    public function getValidDataForBarService(): array
    {
        return [
            'login' => 'BAR_test',
            'password' => $this->getValidPassword()
        ];
    }

    public function getInvalidDataForBarService(): array
    {
        return [
            'login' => 'Bar_test',
            'password' => $this->getValidPassword()
        ];
    }

    public function getValidDataForBazService(): array
    {
        return [
            'login' => 'BAZ_test',
            'password' => $this->getValidPassword()
        ];
    }

    public function getInvalidDataForBazService(): array
    {
        return [
            'login' => 'Baz_test',
            'password' => $this->getValidPassword()
        ];
    }

    public function getInvalidData(): array
    {
        return [
            'login' => 'test_test',
            'password' => 'test'
        ];
    }

    public function getHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
    }

    private function getValidPassword(): string
    {
        return 'foo-bar-baz';
    }
}