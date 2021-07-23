<?php

declare(strict_types=1);

namespace App\Commons\Bus;

use Illuminate\Contracts\Foundation\Application;

abstract class Bus
{
    protected Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    protected function appendHandlerPostfix(string $className): string
    {
        return $className . 'Handler';
    }
}