<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Preload;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class PreloadFontsFactory
{
    public function __invoke(ContainerInterface $container): PreloadFonts
    {
        $config = Config::get($container);
        return new PreloadFonts(
            $config->array('wp-rocket/preload/preload-fonts'),
            $config->bool('wp-rocket/preload/preload-fonts-merge'),
        );
    }
}
