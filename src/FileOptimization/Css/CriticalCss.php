<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Css;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

class CriticalCss implements HookCallbackProviderInterface
{
    private string $criticalcss;

    public function __construct(string $criticalcss)
    {
        $this->criticalcss = $criticalcss;
    }

    public function registerCallbacks(): void
    {
        add_filter('get_rocket_option_critical_css', [$this, 'filterCriticalCssOption']);
    }

    public function filterCriticalCssOption(string $criticalcss): string
    {
        return $this->criticalcss !== '' ? $this->criticalcss : $criticalcss;
    }
}
