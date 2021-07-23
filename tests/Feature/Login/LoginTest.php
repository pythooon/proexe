<?php

declare(strict_types=1);

namespace Tests\Feature\Login;

use Tests\TestCase;

class LoginTest extends TestCase
{
    private LoginTestData $testData;
    private LoginAssertion $assertion;

    public function test_Login_WhenDataIsValid_ForFooService_ShouldReturnSuccessStatusWithToken(): void
    {
        $this->assertion->assertSuccessLogin($this->testData->getValidDataForFooService(), $this->testData->getHeaders());
    }

    public function test_Login_WhenDataIsInvalid_ForFooService_ShouldReturnSuccessStatusWithToken(): void
    {
        $this->assertion->assertNotSuccessLogin($this->testData->getInvalidDataForFooService(), $this->testData->getHeaders());
    }

    public function test_Login_WhenDataIsValid_ForBarService_ShouldReturnSuccessStatusWithToken(): void
    {
        $this->assertion->assertSuccessLogin($this->testData->getValidDataForBarService(), $this->testData->getHeaders());
    }

    public function test_Login_WhenDataIsInvalid_ForBarService_ShouldReturnSuccessStatusWithToken(): void
    {
        $this->assertion->assertNotSuccessLogin($this->testData->getInvalidDataForBarService(), $this->testData->getHeaders());
    }

    public function test_Login_WhenDataIsValid_ForBazService_ShouldReturnSuccessStatusWithToken(): void
    {
        $this->assertion->assertSuccessLogin($this->testData->getValidDataForBazService(), $this->testData->getHeaders());
    }

    public function test_Login_WhenDataIsInvalid_ForBazService_ShouldReturnSuccessStatusWithToken(): void
    {
        $this->assertion->assertNotSuccessLogin($this->testData->getInvalidDataForBazService(), $this->testData->getHeaders());
    }

    public function test_Login_WhenDataIsInvalid_WithInvalidDataForAllServices_ShouldReturnSuccessStatusWithToken(): void
    {
        $this->assertion->assertNotSuccessLogin($this->testData->getInvalidData(), $this->testData->getHeaders());
    }


    public function setUp(): void
    {
        parent::setUp();
        $this->testData = $this->app->make(LoginTestData::class);
        $this->assertion = new LoginAssertion($this);
    }
}