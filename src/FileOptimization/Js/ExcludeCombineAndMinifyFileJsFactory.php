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
            $config->array('wp-rocket/file-optimization/js/combine-file-js-exclusions'),
            $config->bool('wp-rocket/file-optimization/js/combine-file-js-exclusions-merge')
        );
    }
}
