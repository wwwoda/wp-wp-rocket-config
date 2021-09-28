<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Css;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CriticalCssFactory
{
    public function __invoke(ContainerInterface $container): CriticalCss
    {
        $config = Config::get($container);
        return new CriticalCss($config->string('wp-rocket/file-optimization/css/fallback-critical-css'));
    }
}
