<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

use function array_filter;
use function array_merge;
use function array_unique;

abstract class AbstractArrayMerger implements HookCallbackProviderInterface
{
    /** @var list<string> */
    private array $strings;
    private bool $merge;

    /**
     * @param list<string> $strings
     */
    public function __construct(array $strings = [], bool $merge = true)
    {
        $this->strings = $strings;
        $this->merge = $merge;
    }

    /**
     * @param list<string> $strings
     * @return list<string>
     */
    public function mergeArrays(array $strings): array
    {
        if ($this->strings === []) {
            return $strings;
        }
        return $this->merge === true
            ? array_filter(array_unique(array_merge($strings, $this->strings)))
            : $this->strings;
    }
}
