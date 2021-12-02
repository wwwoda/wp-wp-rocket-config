<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeDelayJsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeDelayJs
    {
        $config = Config::get($container);
        return new ExcludeDelayJs(
            $config->array('wp_rocket/file_optimization/js/delay_js_exclusions'),
            $config->bool('wp_rocket/file_optimization/js/delay_js_exclusions_merge')
        );
    }
}
