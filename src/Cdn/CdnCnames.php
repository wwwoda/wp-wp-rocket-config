<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Cdn;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

use function array_map;
use function in_array;
use function is_array;

class CdnCnames implements HookCallbackProviderInterface
{
    /** @var array<array-key, mixed> */
    private array $cnames;
    private bool $lockCnames;

    /**
     * @param array<array-key, mixed> $cnames
     */
    public function __construct(array $cnames = [], bool $lockCnames = false)
    {
        $this->cnames = $cnames;
        $this->lockCnames = $lockCnames;
    }

    public function registerCallbacks(): void
    {
        if ($this->lockCnames !== true) {
            return;
        }
        add_filter('get_rocket_option_cdn_cnames', [$this, 'getCdnNames']);
        add_filter('get_rocket_option_cdn_zone', [$this, 'getCdnZones']);
    }

    /**
     * @return list<string>
     */
    public function getCdnNames(): array
    {
        return array_map(function ($val) {
            return is_array($val) ? $val[0] : $val;
        }, $this->cnames);
    }

    /**
     * @return list<'all'|'images'|'css_and_js'|'js'|'css'>
     */
    public function getCdnZones(): array
    {
        $zones = array_map(function ($val) {
            if (
                !is_array($val)
                || !in_array($val[1], ['all', 'images', 'css_and_js', 'js', 'css'], true)
            ) {
                return 'all';
            }
            return $val[1];
        }, $this->cnames);
        $zones[] = 'all';
        return $zones;
    }
}
