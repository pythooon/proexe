<?php

declare(strict_types=1);

namespace App\Query\Auth\Login;

use App\Exceptions\Auth\InvalidExternalServiceException;
use App\Exceptions\Auth\InvalidUserLoginPrefixException;
use App\Exceptions\Auth\LoginException;
use App\Mapper\LoginMapper;
use App\Strategy\LoginStrategy\LoginDirector;
use App\ValueObject\UserLogin;
use App\View\LoginView;

class LoginHandler
{
    private LoginDirector $loginDirector;
    private LoginMapper $loginMapper;

    public function __construct(LoginDirector $loginDirector, LoginMapper $loginMapper)
    {
        $this->loginDirector = $loginDirector;
        $this->loginMapper = $loginMapper;
    }

    public function handle(Login $query): LoginView
    {
        $contract = $query->getContract();

        try {
            $userLogin = new UserLogin($contract->getLogin(), $contract->getPassword());
            $result = $this->loginDirector->doLogin($userLogin);
        } catch (InvalidExternalServiceException | InvalidUserLoginPrefixException | LoginException $e) {
            return $this->loginMapper->map(false);
        }

        return $this->loginMapper->map($result, $userLogin);
    }
}