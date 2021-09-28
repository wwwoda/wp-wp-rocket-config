<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Css;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class CssSafelist extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('get_rocket_option_remove_unused_css_safelist', [$this, 'mergeArrays'], 10);
    }
}
