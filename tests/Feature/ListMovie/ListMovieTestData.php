<?php

declare(strict_types=1);

namespace Tests\Feature\ListMovie;

class ListMovieTestData
{
    public function getValidTitleList(): array
    {
        return [
            "The Kentucky Fried Movie",
            "The Public Enemy",
            "Dog Day Afternoon",
            "Star Wars: Episode IV - A New Hope",
            "The Devil and Miss Jones",
            "Attack of the 50 Foot Woman",
            "The Fish That Saved Pittsburgh",
            "Army of Darkness"
        ];
    }
}