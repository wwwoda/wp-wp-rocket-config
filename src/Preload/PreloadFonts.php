<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Preload;

use Woda\WordPress\WpRocket\AbstractArrayMerger;

class PreloadFonts extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_preload_fonts', [$this, 'mergeArrays']);
    }
}
