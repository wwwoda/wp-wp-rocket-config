<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class AlwaysPurgeUrls extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_post_purge_urls', [$this, 'mergeArrays']);
    }
}
