<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService\Baz;

use App\Adapter\ExternalService\LoginAdapter;
use App\Adapter\ExternalService\MovieAdapter;

interface BazAdapter extends LoginAdapter, MovieAdapter
{
}