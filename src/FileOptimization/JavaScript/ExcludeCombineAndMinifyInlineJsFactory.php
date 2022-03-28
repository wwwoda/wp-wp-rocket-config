<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCombineAndMinifyInlineJsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCombineAndMinifyInlineJs
    {
        $config = Config::get($container);
        return new ExcludeCombineAndMinifyInlineJs(
            'exclude_inline_js',
            $config->array('wp_rocket/file_optimization/js/combine_inline_js_exclusions'),
            $config->bool('wp_rocket/file_optimization/js/combine_inline_js_exclusions_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
