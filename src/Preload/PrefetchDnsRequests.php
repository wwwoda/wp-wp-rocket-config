<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class PrefetchDnsRequests extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_dns_prefetch', [$this, 'mergeSettings']);
        add_filter('get_rocket_option_dns_prefetch', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }
}
