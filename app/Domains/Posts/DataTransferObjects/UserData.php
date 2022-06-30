<?php

namespace Domains\Posts\DataTransferObjects;

use Spatie\LaravelData\Data;

/** @typescript */
class UserData extends Data
{
    public function __construct(public int $id, public string $name)
    {
    }
}
