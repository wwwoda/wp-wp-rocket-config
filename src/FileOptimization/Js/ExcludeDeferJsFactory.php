<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Js;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeDeferJsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeDeferJs
    {
        $config = Config::get($container);
        return new ExcludeDeferJs(
            $config->array('wp-rocket/file-optimization/js/defer-js-exclusions'),
            $config->bool('wp-rocket/file-optimization/js/defer-js-exclusions-merge')
        );
    }
}
