<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Js;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class ExcludeDelayJs extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_delay_js_exclusions', [$this, 'mergeArrays']);
    }
}
