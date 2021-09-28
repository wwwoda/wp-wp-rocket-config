<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Js;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class ExcludeCombineAndMinifyFileJs extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_excluded_inline_js_content', [$this, 'mergeArrays']);
    }
}
