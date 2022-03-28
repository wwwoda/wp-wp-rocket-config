<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CacheQueryStringsFactory
{
    public function __invoke(ContainerInterface $container): CacheQueryStrings
    {
        $config = Config::get($container);
        return new CacheQueryStrings(
            'cache_query_strings',
            $config->array('wp_rocket/advanced_rules/force_cache_query_strings'),
            $config->bool('wp_rocket/advanced_rules/force_cache_query_strings_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
