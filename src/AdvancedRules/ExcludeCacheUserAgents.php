<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class ExcludeCacheUserAgents extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_cache_reject_ua', [$this, 'mergeArrays']);
    }
}
