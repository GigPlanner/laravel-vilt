<?php

namespace Domains\Posts\DataTransferObjects;

use Carbon\CarbonInterface;
use Spatie\LaravelData\Data;

/** @typescript */
class PostData extends Data
{
    public function __construct(
        public UserData $user,
        public int $id,
        public string $title,
        public string $content,
        public ?CarbonInterface $publishedAt,
    ) {
    }
}
