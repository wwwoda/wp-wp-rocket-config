<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class WpRocketConfigFactory
{
    public function __invoke(ContainerInterface $container): WpRocketConfig
    {
        $config = Config::get($container);
        return new WpRocketConfig();
    }
}
