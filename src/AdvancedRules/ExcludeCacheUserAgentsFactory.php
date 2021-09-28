<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCacheUserAgentsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCacheUserAgents
    {
        $config = Config::get($container);
        return new ExcludeCacheUserAgents(
            $config->array('wp-rocket/advanced-rules/never-cache-user-agents'),
            $config->bool('wp-rocket/advanced-rules/never-cache-user-agents-merge')
        );
    }
}
