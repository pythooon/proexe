<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService\Foo;

use App\Adapter\ExternalService\LoginAdapter;
use App\Adapter\ExternalService\MovieAdapter;

interface FooAdapter extends LoginAdapter, MovieAdapter
{
}