<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class Sitemaps extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_sitemap_preload_list', [$this, 'mergeSettings']);
        add_filter('get_rocket_option_sitemaps', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }
}
