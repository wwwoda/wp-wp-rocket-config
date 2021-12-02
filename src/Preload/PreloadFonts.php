<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class PreloadFonts extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_preload_fonts', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_preload_fonts', [$this, 'maybeOverwriteSetting']);
    }
}
