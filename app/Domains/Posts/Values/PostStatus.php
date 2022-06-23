<?php

namespace Domains\Posts\Values;

/** @typescript */
enum PostStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
}
