<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeDeferJsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeDeferJs
    {
        $config = Config::get($container);
        return new ExcludeDeferJs(
            'exclude_defer_js',
            $config->array('wp_rocket/file_optimization/js/defer_js_exclusions'),
            $config->bool('wp_rocket/file_optimization/js/defer_js_exclusions_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
