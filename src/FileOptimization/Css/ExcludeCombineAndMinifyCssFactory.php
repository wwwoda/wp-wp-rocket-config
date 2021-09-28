<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Css;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCombineAndMinifyCssFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCombineAndMinifyCss
    {
        $config = Config::get($container);
        return new ExcludeCombineAndMinifyCss(
            $config->array('wp-rocket/file-optimization/css/combine-css-exclusions'),
            $config->bool('wp-rocket/file-optimization/css/combine-css-exclusions-merge')
        );
    }
}
