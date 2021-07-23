<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService\Bar;

use App\Adapter\ExternalService\LoginAdapter;
use App\Adapter\ExternalService\MovieAdapter;

interface BarAdapter extends LoginAdapter, MovieAdapter
{

}