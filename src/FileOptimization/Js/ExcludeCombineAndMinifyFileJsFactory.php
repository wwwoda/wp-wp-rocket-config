<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Js;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCombineAndMinifyFileJsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCombineAndMinifyFileJs
    {
        $config = Config::get($container);
        return new ExcludeCombineAndMinifyFileJs(
            $config->array('wp_rocket/file_optimization/js/combine_file_js_exclusions'),
            $config->bool('wp_rocket/file_optimization/js/combine_file_js_exclusions_merge')
        );
    }
}
