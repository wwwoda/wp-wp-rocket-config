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
            $config->array('wp_rocket/advanced_rules/always_purge_urls'),
            $config->bool('wp_rocket/advanced_rules/always_purge_urls_merge'),
        );
    }
}
