<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class PreloadFontsFactory
{
    public function __invoke(ContainerInterface $container): PreloadFonts
    {
        $config = Config::get($container);
        return new PreloadFonts(
            'preload_fonts',
            $config->array('wp_rocket/preload/preload_fonts'),
            $config->bool('wp_rocket/preload/preload_fonts_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
