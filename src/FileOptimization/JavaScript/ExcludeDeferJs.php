<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class ExcludeDeferJs extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_exclude_defer_js', [$this, 'mergeSettings']);
        add_filter('get_rocket_option_exclude_defer_js', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }
}
