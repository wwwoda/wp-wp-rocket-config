<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class ExcludeCombineAndMinifyCss extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_exclude_css', [$this, 'mergeArrays'], 10);
    }
}
