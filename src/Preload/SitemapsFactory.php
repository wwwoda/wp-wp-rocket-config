<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class SitemapsFactory
{
    public function __invoke(ContainerInterface $container): Sitemaps
    {
        $config = Config::get($container);
        return new Sitemaps(
            'sitemaps',
            $config->array('wp_rocket/preload/sitemaps'),
            $config->bool('wp_rocket/preload/sitemaps_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
