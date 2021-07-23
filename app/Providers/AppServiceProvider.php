<?php

declare(strict_types=1);

namespace App\Providers;

use App\Adapter\ExternalService\Bar\BarAdapter;
use App\Adapter\ExternalService\Bar\BarAdapterImpl;
use App\Adapter\ExternalService\Baz\BazAdapter;
use App\Adapter\ExternalService\Baz\BazAdapterImpl;
use App\Adapter\ExternalService\Foo\FooAdapter;
use App\Adapter\ExternalService\Foo\FooAdapterImpl;
use App\Commons\QueryBus\QueryBus;
use App\Commons\QueryBus\QueryBusImpl;
use App\Query\Movie\ListMovies\ListMoviesHandler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(QueryBus::class, QueryBusImpl::class);
        $this->app->bind(FooAdapter::class, FooAdapterImpl::class);
        $this->app->bind(BarAdapter::class, BarAdapterImpl::class);
        $this->app->bind(BazAdapter::class, BazAdapterImpl::class);
        $this->app->bind(ListMoviesHandler::class, function() {
           return new ListMoviesHandler(
               $this->app->make(FooAdapter::class),
               $this->app->make(BarAdapter::class),
               $this->app->make(BazAdapter::class)
           );
        });
    }

    public function boot(): void
    {
    }
}
