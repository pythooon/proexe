<?php

declare(strict_types=1);

namespace App\Query\Movie\ListMovies;


use App\Adapter\ExternalService\MovieAdapter;
use Illuminate\Support\Facades\Cache;

class ListMoviesHandler
{
    private array $externalAdapters;

    public function __construct(...$externalAdapters)
    {
        $this->externalAdapters = $externalAdapters;
    }

    public function handle(ListMovies $query): array
    {
        $movies = [];

        if (!Cache::has('titles')) {
            foreach ($this->externalAdapters as $adapter) {
                /** @var MovieAdapter $adapter */
                $movies = array_merge($adapter->getTitles(), $movies);
            }
            Cache::store('file')->put('titles', $movies, 720);
        } else {
            $movies = Cache::get('titles');
        }

        return $movies;
    }
}