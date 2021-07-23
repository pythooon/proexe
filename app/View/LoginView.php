<?php

declare(strict_types=1);

namespace App\View;

use App\ValueObject\Status;

class LoginView
{
    private Status $status;
    private ?string $token = null;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    public function setToken(string $token)
    {
        $this->token = $token;
    }

    public function serialize(): array
    {
        $data = [
            'status' => (string) $this->status,
        ];

        if ($this->token) {
            $data['token'] = $this->token;
        }

        return $data;
    }
}