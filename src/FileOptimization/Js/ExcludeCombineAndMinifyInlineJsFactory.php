<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Js;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCombineAndMinifyInlineJsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCombineAndMinifyInlineJs
    {
        $config = Config::get($container);
        return new ExcludeCombineAndMinifyInlineJs(
            $config->array('wp-rocket/file-optimization/js/combine-inline-js-exclusions'),
            $config->bool('wp-rocket/file-optimization/js/combine-inline-js-exclusions-merge')
        );
    }
}
