<?php

declare(strict_types=1);

namespace App\Commons\QueryBus;

interface QueryBus
{
    public function handle(Query $query);
}