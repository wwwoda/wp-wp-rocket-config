<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

class CriticalCss implements HookCallbackProviderInterface
{
    private string $criticalcss;
    /** @var list<string> */
    private array $asyncEsclusions;

    /**
     * @param list<string> $asyncEsclusions
     */
    public function __construct(string $criticalcss, bool $disable, array $asyncEsclusions)
    {
        $this->criticalcss = $criticalcss;
        $this->disable = $disable;
        $this->asyncEsclusions = $asyncEsclusions;
    }

    public function registerCallbacks(): void
    {
        add_filter('get_rocket_option_critical_css', [$this, 'filterCriticalCssOption']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
    }

    public function filterCriticalCssOption(string $criticalcss): string
    {
        if (
            count($this->asyncEsclusions) > 0
            && $criticalcss === ''
            && $this->criticalcss === ''
        ) {
            return ' ';
        }
        return $this->criticalcss !== '' ? $this->criticalcss : $criticalcss;
    }

    /**
     * @param array<string, mixed> $settings
     * @return array<string, mixed>
     */
    public function maybeDisableField(array $fieldSettings): array
    {
        if (
            $fieldSettings['id'] !== 'optimize_css_delivery_method'
            || $this->disable !== true
        ) {
            return $fieldSettings;
        }
        $fieldSettings['options']['async_css']['sub_fields']['critical_css']['input_attr']['disabled'] = 1;
        return $fieldSettings;
    }
}
