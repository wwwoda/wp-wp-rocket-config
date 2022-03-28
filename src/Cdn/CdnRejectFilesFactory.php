<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Cdn;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class CdnRejectFilesFactory
{
    public function __invoke(ContainerInterface $container): CdnRejectFiles
    {
        $config = Config::get($container);
        return new CdnRejectFiles(
            'cdn_reject_files',
            $config->array('wp_rocket/cdn/cdn_file_exclusions'),
            $config->bool('wp_rocket/cdn/cdn_file_exclusions_disable_field'),
            $config->string('wp_rocket/disabled_field_classname')
        );
    }
}
