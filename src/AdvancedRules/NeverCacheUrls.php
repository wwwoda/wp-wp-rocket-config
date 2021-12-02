<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class NeverCacheUrls extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_cache_reject_uri', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_cache_reject_uri', [$this, 'maybeOverwriteSetting']);
    }
}
