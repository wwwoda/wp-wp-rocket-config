<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ForceCacheQueryStringsFactory
{
    public function __invoke(ContainerInterface $container): ForceCacheQueryStrings
    {
        $config = Config::get($container);
        return new ForceCacheQueryStrings(
            $config->array('wp-rocket/advanced-rules/force-cache-query-strings'),
            $config->bool('wp-rocket/advanced-rules/force-cache-query-strings-merge')
        );
    }
}
