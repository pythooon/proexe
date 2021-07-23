<?php

declare(strict_types=1);

namespace App\ValueObject;

class Status
{
    private const SUCCESS = 'success';
    private const FAILURE = 'failure';
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function success(): self
    {
        return new self(self::SUCCESS);
    }

    public static function failure(): self
    {
        return new self(self::FAILURE);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}