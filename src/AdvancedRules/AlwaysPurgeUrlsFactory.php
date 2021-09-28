<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class AlwaysPurgeUrlsFactory
{
    public function __invoke(ContainerInterface $container): AlwaysPurgeUrls
    {
        $config = Config::get($container);
        return new AlwaysPurgeUrls($config->array('wp-rocket/advanced-rules/always-purge-urls'));
    }
}
