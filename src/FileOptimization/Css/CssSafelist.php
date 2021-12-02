<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class CssSafelist extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_rucss_safelist', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_remove_unused_css_safelist', [$this, 'maybeOverwriteSetting']);
    }
}
