<?php

namespace Domains\Posts\DataTransferObjects;

use Carbon\CarbonInterface;
use Spatie\LaravelData\Data;

/** @typescript */
class PostCreationData extends Data
{
    public function __construct(public string $title, public string $content)
    {
    }
}
