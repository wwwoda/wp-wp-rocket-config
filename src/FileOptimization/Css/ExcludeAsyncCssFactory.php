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
            $config->array('wp-rocket/file-optimization/css/async-css-exclusions'),
            $config->bool('wp-rocket/file-optimization/css/async-css-exclusions-merge')
        );
    }
}
