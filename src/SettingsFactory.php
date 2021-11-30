<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

/**
 * @phpstan-import-type WpRocketCacheSettings from ConfigProvider
 * @phpstan-import-type WpRocketCssSettings from ConfigProvider
 * @phpstan-import-type WpRocketJavaScriptSettings from ConfigProvider
 * @phpstan-import-type WpRocketMediaSettings from ConfigProvider
 * @phpstan-import-type WpRocketPreloadSettings from ConfigProvider
 * @phpstan-import-type WpRocketDatabaseSettings from ConfigProvider
 * @phpstan-import-type WpRocketCdnSettings from ConfigProvider
 * @phpstan-import-type WpRocketHeartbeatSettings from ConfigProvider
 */
class SettingsFactory
{
    public function __invoke(ContainerInterface $container): Settings
    {
        $config = Config::get($container);
        /** @var WpRocketCacheSettings $cacheSettings */
        $cacheSettings = $config->array('wp_rocket/cache/settings');
        /** @var WpRocketCssSettings $cssSettings */
        $cssSettings = $config->array('wp_rocket/file_optimization/css/settings');
        /** @var WpRocketJavaScriptSettings $javaScriptSettings */
        $javaScriptSettings = $config->array('wp_rocket/file_optimization/js/settings');
        /** @var WpRocketMediaSettings $mediaSettings */
        $mediaSettings = $config->array('wp_rocket/media/settings');
        /** @var WpRocketPreloadSettings $preloadSettings */
        $preloadSettings = $config->array('wp_rocket/preload/settings');
        /** @var WpRocketDatabaseSettings $databaseSettings */
        $databaseSettings = $config->array('wp_rocket/database/settings');
        /** @var WpRocketCdnSettings $cdnSettings */
        $cdnSettings = $config->array('wp_rocket/cdn/settings');
        /** @var WpRocketHeartbeatSettings $heartbeatSettings */
        $heartbeatSettings = $config->array('wp_rocket/heartbeat/settings');
        return new Settings(
            $cacheSettings,
            $cssSettings,
            $javaScriptSettings,
            $mediaSettings,
            $preloadSettings,
            $databaseSettings,
            $cdnSettings,
            $heartbeatSettings
        );
    }
}
