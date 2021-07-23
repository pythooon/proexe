<?php

declare(strict_types=1);

namespace Tests\Feature\ListMovie;

use Tests\TestCase;

class ListMovieTest extends TestCase
{
    private ListMovieTestData $testData;
    private ListMovieAssertion $assertion;

    public function test_GetListMovie_ShouldReturnValidData(): void
    {
        $validData = $this->testData->getValidTitleList();
        $this->assertion->assertSuccessGetTitlesList($validData);
        $this->assertion->assertCountResponse($validData);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->testData = $this->app->make(ListMovieTestData::class);
        $this->assertion = new ListMovieAssertion($this);
    }
}