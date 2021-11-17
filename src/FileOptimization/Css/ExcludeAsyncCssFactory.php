<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeAsyncCssFactory
{
    public function __invoke(ContainerInterface $container): ExcludeAsyncCss
    {
        $config = Config::get($container);
        return new ExcludeAsyncCss(
            $config->array('wp_rocket/file_optimization/css/async_css_exclusions'),
            $config->bool('wp_rocket/file_optimization/css/async_css_exclusions_merge')
        );
    }
}
