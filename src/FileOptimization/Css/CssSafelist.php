<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Woda\WordPress\WpRocket\Settings\AbstractDeactivateableField;

class CssSafelist extends AbstractDeactivateableField
{
    public function registerCallbacks(): void
    {
        add_filter('rocket_rucss_safelist', [$this, 'mergeSettings']);
        add_filter('get_rocket_option_remove_unused_css_safelist', [$this, 'mergeSettings']);
        add_filter('rocket_before_add_field_to_settings', [$this, 'maybeDisableField']);
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
        if (!isset($fieldSettings['options']['remove_unused_css']['sub_fields'][$this->id]['container_class'])) {
            $fieldSettings['options']['remove_unused_css']['sub_fields'][$this->id]['container_class'] = [$this->disableClassname];
        } else {
            $fieldSettings['options']['remove_unused_css']['sub_fields'][$this->id]['container_class'][] = $this->disableClassname;
        }
        return $fieldSettings;
    }
}
