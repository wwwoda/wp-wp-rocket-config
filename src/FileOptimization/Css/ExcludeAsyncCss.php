<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class ExcludeAsyncCss extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_exclude_async_css', [$this, 'mergeSettings']);
    }
}
