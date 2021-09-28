<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\AdvancedRules;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCacheCookiesFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCacheCookies
    {
        $config = Config::get($container);
        return new ExcludeCacheCookies(
            $config->array('wp-rocket/advanced-rules/never-cache-cookies'),
            $config->bool('wp-rocket/advanced-rules/never-cache-cookies-merge')
        );
    }
}
