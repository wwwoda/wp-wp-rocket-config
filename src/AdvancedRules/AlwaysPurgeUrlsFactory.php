<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class AlwaysPurgeUrlsFactory
{
    public function __invoke(ContainerInterface $container): AlwaysPurgeUrls
    {
        $config = Config::get($container);
        return new AlwaysPurgeUrls(
            'cache_purge_pages',
            $config->array('wp_rocket/advanced_rules/always_purge_urls'),
            $config->bool('wp_rocket/advanced_rules/always_purge_urls_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
