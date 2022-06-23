<?php

namespace Domains\Posts\DataTransferObjects;

use Carbon\CarbonImmutable;
use Domains\Posts\Values\PostStatus;
use Spatie\LaravelData\Data;

/** @typescript */
class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $content,
        public PostStatus $status,
        public ?CarbonImmutable $published_at
    ) {
    }
}
