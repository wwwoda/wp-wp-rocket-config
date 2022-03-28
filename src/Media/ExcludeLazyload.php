<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Media;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class ExcludeLazyload extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('get_rocket_option_exclude_lazyload', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }
}
