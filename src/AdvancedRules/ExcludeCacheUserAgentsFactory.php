<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCacheUserAgentsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCacheUserAgents
    {
        $config = Config::get($container);
        return new ExcludeCacheUserAgents(
            $config->array('wp_rocket/advanced_rules/never_cache_user_agents'),
            $config->bool('wp_rocket/advanced_rules/never_cache_user_agents_merge')
        );
    }
}
