<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Cdn;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CdnCnamesFactory
{
    public function __invoke(ContainerInterface $container): CdnCnames
    {
        $config = Config::get($container);
        return new CdnCnames($config->array('wp-rocket/cdn/cnames'), true);
    }
}
