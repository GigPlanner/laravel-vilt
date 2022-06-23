<?php

namespace Domains\Shared\Values;

/** @typescript */
class Link
{
    public function __construct(
        public readonly string $url,
        public readonly bool $isExternal = false,
        public readonly bool $isInertia = true
    ) {}
}
