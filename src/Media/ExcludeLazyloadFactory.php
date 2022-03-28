<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Media;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class ExcludeLazyloadFactory
{
    public function __invoke(ContainerInterface $container): ExcludeLazyload
    {
        $config = Config::get($container);
        return new ExcludeLazyload(
            'exclude_lazyload',
            $config->array('wp_rocket/media/exclude_lazyload'),
            $config->bool('wp_rocket/media/exclude_lazyload_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
