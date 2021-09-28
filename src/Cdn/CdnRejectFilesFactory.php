<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Cdn;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CdnRejectFilesFactory
{
    public function __invoke(ContainerInterface $container): CdnRejectFiles
    {
        $config = Config::get($container);
        return new CdnRejectFiles(
            $config->array('wp-rocket/cdn/cdn-file-exclusions'),
            $config->bool('wp-rocket/cdn/cdn-file-exclusions-merge')
        );
    }
}
