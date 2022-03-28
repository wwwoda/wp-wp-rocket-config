<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\FileOptimization\Css;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CssSafelistFactory
{
    public function __invoke(ContainerInterface $container): CssSafelist
    {
        $config = Config::get($container);
        return new CssSafelist(
            'remove_unused_css_safelist',
            $config->array('wp_rocket/file_optimization/css/css_safelist'),
            $config->bool('wp_rocket/file_optimization/css/css_safelist_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
