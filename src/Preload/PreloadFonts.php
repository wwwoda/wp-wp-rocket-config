<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class PreloadFonts extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_preload_fonts', [$this, 'mergeSettings']);
        add_filter('get_rocket_option_preload_fonts', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }
}
