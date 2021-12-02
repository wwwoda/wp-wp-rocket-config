<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class ExcludeCombineAndMinifyFileJs extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_excluded_js_content', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_exclude_js', [$this, 'maybeOverwriteSetting']);
    }
}
