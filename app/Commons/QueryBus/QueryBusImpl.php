<?php

declare(strict_types=1);

namespace App\Commons\QueryBus;

use App\Commons\Bus\Bus;

class QueryBusImpl extends Bus implements QueryBus
{
    public function handle(Query $query)
    {
        $className = get_class($query);

        return $this->app->make($this->appendHandlerPostfix($className))->handle($query);
    }
}