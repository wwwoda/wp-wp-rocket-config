<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Cdn;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class CdnRejectFiles extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_cdn_reject_files', [$this, 'mergeSettings']);
        add_filter('get_rocket_option_cdn_reject_files', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }
}
