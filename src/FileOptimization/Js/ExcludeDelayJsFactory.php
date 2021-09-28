<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Js;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeDelayJsFactory
{
    public function __invoke(ContainerInterface $container): ExcludeDelayJs
    {
        $config = Config::get($container);
        return new ExcludeDelayJs(
            $config->array('wp-rocket/file-optimization/js/delay-js-exclusions'),
            $config->bool('wp-rocket/file-optimization/js/delay-js-exclusions-merge')
        );
    }
}
