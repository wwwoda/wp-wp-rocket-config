<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\FileOptimization\Css;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CssSafelistFactory
{
    public function __invoke(ContainerInterface $container): CssSafelist
    {
        $config = Config::get($container);
        return new CssSafelist(
            $config->array('wp-rocket/file-optimization/css/css-safelist'),
            $config->bool('wp-rocket/file-optimization/css/css-safelist-merge')
        );
    }
}
