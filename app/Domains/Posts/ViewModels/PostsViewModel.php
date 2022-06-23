<?php

namespace Domains\Posts\ViewModels;

use Spatie\ViewModels\ViewModel;

/** @typescript */
class PostsViewModel extends ViewModel
{
    /** @var array<\Domains\Posts\DataTransferObjects\PostData> */
    public array $posts;

    public function __construct(public string $title, array $posts)
    {
        $this->posts = $posts;
    }
}
