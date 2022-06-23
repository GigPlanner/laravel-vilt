<?php

namespace Domains\Shared\DataTransferObjects;

use Domains\Shared\Values\Link;

/** @typescript  */
class MenuItem
{
    /**
     * @param self[] $children
     */
    public function __construct(
        public string $title,
        public Link $link,
        public bool $isActive = false,
        public array $children = [],
    ) {
    }
}
