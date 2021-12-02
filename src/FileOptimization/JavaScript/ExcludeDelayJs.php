<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class ExcludeDelayJs extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_delay_js_exclusions', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_delay_js_exclusions', [$this, 'maybeOverwriteSetting']);
    }
}
