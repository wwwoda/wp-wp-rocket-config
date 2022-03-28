<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class NeverCacheUrls extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_cache_reject_uri', [$this, 'mergeSettings']);
        add_filter('get_rocket_option_cache_reject_uri', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }
}
