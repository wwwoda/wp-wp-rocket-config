<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class PrefetchDnsRequests extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_dns_prefetch', [$this, 'mergeArrays']);
    }
}
