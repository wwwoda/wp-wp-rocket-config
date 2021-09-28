<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\AdvancedRules;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class ExcludeCacheUserAgents extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_cache_reject_ua', [$this, 'mergeArrays']);
    }
}
