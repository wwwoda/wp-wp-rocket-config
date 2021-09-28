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
            $config->array('wp-rocket/advanced-rules/never-cache-urls'),
            $config->bool('wp-rocket/advanced-rules/never-cache-urls-merge')
        );
    }
}
