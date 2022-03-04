<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

use function array_filter;
use function array_merge;
use function array_unique;

abstract class AbstractArrayMerger implements HookCallbackProviderInterface
{
    /** @var array<array-key, mixed> */
    private array $strings;
    private bool $merge;

    /**
     * @param array<array-key, mixed> $strings
     */
    public function __construct(array $strings = [], bool $merge = true)
    {
        $this->strings = $strings;
        $this->merge = $merge;
    }

    /**
     * @param array<array-key, mixed> $strings
     * @return array<array-key, mixed>
     */
    public function maybeMergeSetting(array $strings): array
    {
        if ($this->merge === false) {
            return $this->strings === []
                ? $strings
                : $this->strings;
        }
        return array_filter(array_unique(array_merge($strings, $this->strings)));
    }

    /**
     * @param array<array-key, mixed> $strings
     * @return array<array-key, mixed>
     */
    public function maybeOverwriteSetting(array $strings): array
    {
        return $this->merge === true ? $strings : array_unique($this->strings);
    }
}
