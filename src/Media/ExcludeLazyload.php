<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Media;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class ExcludeLazyload extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('get_rocket_option_exclude_lazyload', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_exclude_lazyload', [$this, 'maybeOverwriteSetting']);
    }
}
