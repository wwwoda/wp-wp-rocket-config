<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCacheUrlsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCacheUrls
    {
        $config = Config::get($container);
        return new ExcludeCacheUrls(
            $config->array('wp_rocket/advanced_rules/never_cache_urls'),
            $config->bool('wp_rocket/advanced_rules/never_cache_urls_merge')
        );
    }
}
