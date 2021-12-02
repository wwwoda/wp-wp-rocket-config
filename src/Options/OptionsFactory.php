<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Options;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;
use Woda\WordPress\WpRocket\Settings\ConfigProvider;

/**
 * @phpstan-import-type WpRocketCacheOptions from ConfigProvider
 * @phpstan-import-type WpRocketCssOptions from ConfigProvider
 * @phpstan-import-type WpRocketJavaScriptOptions from ConfigProvider
 * @phpstan-import-type WpRocketMediaOptions from ConfigProvider
 * @phpstan-import-type WpRocketPreloadOptions from ConfigProvider
 * @phpstan-import-type WpRocketDatabaseOptions from ConfigProvider
 * @phpstan-import-type WpRocketCdnOptions from ConfigProvider
 * @phpstan-import-type WpRocketHeartbeatOptions from ConfigProvider
 */
class OptionsFactory
{
    public function __invoke(ContainerInterface $container): Options
    {
        $config = Config::get($container);
        /** @var WpRocketCacheOptions $cacheOptions */
        $cacheOptions = $config->array('wp_rocket/cache/options');
        /** @var WpRocketCssOptions $cssOptions */
        $cssOptions = $config->array('wp_rocket/file_optimization/css/options');
        /** @var WpRocketJavaScriptOptions $javaScriptOptions */
        $javaScriptOptions = $config->array('wp_rocket/file_optimization/js/options');
        /** @var WpRocketMediaOptions $mediaOptions */
        $mediaOptions = $config->array('wp_rocket/media/options');
        /** @var WpRocketPreloadOptions $preloadOptions */
        $preloadOptions = $config->array('wp_rocket/preload/options');
        /** @var WpRocketDatabaseOptions $databaseOptions */
        $databaseOptions = $config->array('wp_rocket/database/options');
        /** @var WpRocketCdnOptions $cdnOptions */
        $cdnOptions = $config->array('wp_rocket/cdn/options');
        /** @var WpRocketHeartbeatOptions $heartbeatOptions */
        $heartbeatOptions = $config->array('wp_rocket/heartbeat/options');
        return new Options(
            $cacheOptions,
            $cssOptions,
            $javaScriptOptions,
            $mediaOptions,
            $preloadOptions,
            $databaseOptions,
            $cdnOptions,
            $heartbeatOptions
        );
    }
}
