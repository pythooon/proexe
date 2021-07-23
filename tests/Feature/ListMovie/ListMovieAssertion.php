<?php

declare(strict_types=1);

namespace Tests\Feature\ListMovie;

use Tests\TestCase;

class ListMovieAssertion
{
    private TestCase $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function assertSuccessGetTitlesList(array $validData): void
    {
        $this->testCase->json('GET', route('getTitles'))->assertSuccessful()->assertJson($validData);
    }

    public function assertCountResponse(array $validData)
    {
        $this->testCase->json('GET', route('getTitles'))->assertSuccessful()->assertJsonCount(count($validData));
    }
}