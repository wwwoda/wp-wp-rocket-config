<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class NeverCacheCookiesFactory
{
    public function __invoke(ContainerInterface $container): NeverCacheCookies
    {
        $config = Config::get($container);
        return new NeverCacheCookies(
            $config->array('wp_rocket/advanced_rules/never_cache_cookies'),
            $config->bool('wp_rocket/advanced_rules/never_cache_cookies_merge')
        );
    }
}
