<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class Sitemaps extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_sitemap_preload_list', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_sitemaps', [$this, 'maybeOverwriteSetting']);
    }
}
