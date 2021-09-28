<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class ExcludeCacheCookies extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_cache_reject_cookies', [$this, 'mergeArrays']);
    }
}
