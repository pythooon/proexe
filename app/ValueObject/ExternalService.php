<?php

declare(strict_types=1);

namespace App\ValueObject;

use App\Exceptions\Auth\InvalidUserLoginPrefixException;

class ExternalService
{
    public const FOO = 'FOO';
    public const BAR = 'BAR';
    public const BAZ = 'BAZ';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $value)
    {
        switch ($value) {
            case self::withPostfix(self::FOO):
            case self::withPostfix(self::BAR):
            case self::withPostfix(self::BAZ):
                return new self(substr($value, 0, 3));
            default:
                throw new InvalidUserLoginPrefixException('Invalid user prefix');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(string $value): bool
    {
        return $this->value === $value;
    }

    private static function withPostfix(string $value): string
    {
        return $value . '_';
    }
}