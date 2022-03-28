<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CriticalCssFactory
{
    public function __invoke(ContainerInterface $container): CriticalCss
    {
        $config = Config::get($container);
        return new CriticalCss(
            $config->string('wp_rocket/file_optimization/css/fallback_critical_css'),
            $config->bool('wp_rocket/file_optimization/css/fallback_critical_css_disable_field'),
            $config->array('wp_rocket/file_optimization/css/async_css_exclusions')
        );
    }
}
