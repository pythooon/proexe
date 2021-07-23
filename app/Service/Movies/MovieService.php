<?php

declare(strict_types=1);

namespace App\Service\Movies;

use App\Commons\QueryBus\QueryBus;
use App\Query\Movie\ListMovies\ListMovies;

class MovieService
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function getTitles()
    {
        return $this->queryBus->handle(new ListMovies());
    }
}