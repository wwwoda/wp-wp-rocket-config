<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Preload;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class PrefetchDnsRequests extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_dns_prefetch', [$this, 'mergeArrays']);
    }
}
