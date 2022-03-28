<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeCombineAndMinifyCssFactory
{
    public function __invoke(ContainerInterface $container): ExcludeCombineAndMinifyCss
    {
        $config = Config::get($container);
        return new ExcludeCombineAndMinifyCss(
            'exclude_css',
            $config->array('wp_rocket/file_optimization/css/combine_css_exclusions'),
            $config->bool('wp_rocket/file_optimization/css/combine_css_exclusions_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
