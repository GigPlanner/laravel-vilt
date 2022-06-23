<?php

namespace Domains\Posts\DataTransferObjects;

use Carbon\CarbonInterface;
use Illuminate\Contracts\Support\Arrayable;
use Spatie\LaravelData\Data;

/** @typescript */
class PostCreationData extends Data
{
    public function __construct(public string $title, public string $content)
    {
    }

    public static function rules(...$args): array
    {
        return [
            'title' => 'min:10',
        ];
    }
}
