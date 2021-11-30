<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Cdn;

use Woda\WordPress\WpRocket\Settings\AbstractArrayMerger;

class CdnRejectFiles extends AbstractArrayMerger
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_cdn_reject_files', [$this, 'maybeMergeSetting']);
        add_filter('get_rocket_option_cdn_reject_files', [$this, 'maybeOverwriteSetting']);
    }
}
