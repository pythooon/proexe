<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Contract\Auth\LoginContract;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest implements LoginContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => ['required'],
            'password' => ['required']
        ];
    }

    public function getLogin(): string
    {
        return $this->get('login');
    }

    public function getPassword(): string
    {
        return $this->get('password');
    }
}
