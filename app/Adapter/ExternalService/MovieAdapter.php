<?php

declare(strict_types=1);

namespace App\Adapter\ExternalService;

interface MovieAdapter
{
    public function getTitles(): array;
}