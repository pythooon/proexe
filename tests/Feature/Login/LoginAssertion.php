<?php

declare(strict_types=1);

namespace Tests\Feature\Login;

use Tests\TestCase;

class LoginAssertion
{
    private TestCase $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function assertSuccessLogin(array $data, array $headers): void
    {
        $this->testCase->json('POST', route('login'), $data, $headers)->assertSuccessful()->assertJson(
            [
                'status' => 'success'
            ]
        );
        $this->assertJsonStructure($data, $headers);
    }

    public function assertNotSuccessLogin(array $data, array $headers): void
    {
        $this->testCase->json('POST', route('login'), $data, $headers)->assertStatus(400)->assertJson(
            [
                'status' => 'failure'
            ]
        );
    }

    private function assertJsonStructure(array $data, array $headers): void
    {
        $this->testCase->json('POST', route('login'), $data, $headers)->assertSuccessful()->assertJsonStructure(
            [
                'status',
                'token'
            ]
        );
    }
}