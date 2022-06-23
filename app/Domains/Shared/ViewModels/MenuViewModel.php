<?php

namespace Domains\Shared\ViewModels;

use Domains\Shared\DataTransferObjects\MenuItem;
use Spatie\ViewModels\ViewModel;

/** @typescript */
class MenuViewModel extends ViewModel
{
    public function __construct(
        array $items,
    ) {
        $this->items = $items;
    }

    /** @var array<MenuItem> */
    public array $items;
}
