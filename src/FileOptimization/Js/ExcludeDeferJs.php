<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Js;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class ExcludeDeferJs extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_exclude_defer_js', [$this, 'mergeArrays']);
    }
}
