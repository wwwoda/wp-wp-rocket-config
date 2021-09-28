<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Css;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class ExcludeAsyncCss extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_exclude_async_css', [$this, 'mergeArrays'], 10);
    }
}
