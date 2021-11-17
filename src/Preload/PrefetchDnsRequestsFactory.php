<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Preload;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class PrefetchDnsRequestsFactory
{
    public function __invoke(ContainerInterface $container): PrefetchDnsRequests
    {
        $config = Config::get($container);
        return new PrefetchDnsRequests(
            $config->array('wp_rocket/preload/prefetch_urls'),
            $config->bool('wp_rocket/preload/prefetch_urls_merge'),
        );
    }
}
