<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

use function array_filter;
use function array_merge;
use function array_unique;

abstract class AbstractDeactivateableField implements HookCallbackProviderInterface
{
    protected string $id;
    /** @var array<array-key, mixed> */
    protected array $settings;
    protected bool $disable;
    protected string $disableClassname;

    /**
     * @param array<array-key, mixed> $settings
     */
    public function __construct(string $id, array $settings, bool $disable, string $disableClassname)
    {
        $this->id = $id;
        $this->settings = $settings;
        $this->disable = $disable;
        $this->disableClassname = $disableClassname;
    }

    /**
     * @param array<array-key, mixed> $settings
     * @return array<array-key, mixed>
     */
    public function mergeSettings(array $settings): array
    {
        return array_filter(array_unique(array_merge($settings, $this->settings)));
    }

    /**
     * @param array<string, mixed> $settings
     * @return array<string, mixed>
     */
    public function maybeDisableField(array $fieldSettings): array
    {
        if (
            $fieldSettings['id'] !== $this->id
            || $this->disable !== true
        ) {
            return $fieldSettings;
        }
        if (!isset($fieldSettings['container_class'])) {
            $fieldSettings['container_class'] = [$this->disableClassname];
        } else {
            $fieldSettings['container_class'][] = $this->disableClassname;
        }
        return $fieldSettings;
    }
}
