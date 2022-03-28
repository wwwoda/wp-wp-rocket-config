<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class NeverCacheUserAgentsFactory
{
    public function __invoke(ContainerInterface $container): NeverCacheUserAgents
    {
        $config = Config::get($container);
        return new NeverCacheUserAgents(
            'cache_reject_ua',
            $config->array('wp_rocket/advanced_rules/never_cache_user_agents'),
            $config->bool('wp_rocket/advanced_rules/never_cache_user_agents_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
