<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

use function array_merge;

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
class Settings implements HookCallbackProviderInterface
{
    /** @phpstan-var WpRocketCacheSettings  */
    private array $cacheSettings;
    /** @phpstan-var WpRocketCssSettings */
    private array $cssSettings;
    /** @phpstan-var WpRocketJavaScriptSettings */
    private array $javaScriptSettings;
    /** @phpstan-var WpRocketMediaSettings */
    private array $mediaSettings;
    /** @phpstan-var WpRocketPreloadSettings */
    private array $preloadSettings;
    /** @phpstan-var WpRocketDatabaseSettings */
    private array $databaseSettings;
    /** @phpstan-var WpRocketCdnSettings */
    private array $cdnSettings;
    /** @phpstan-var WpRocketHeartbeatSettings */
    private array $heartbeatSettings;

    /**
     * @phpstan-param WpRocketCacheSettings $cacheSettings
     * @phpstan-param WpRocketCssSettings $cssSettings
     * @phpstan-param WpRocketJavaScriptSettings $javaScriptSettings
     * @phpstan-param WpRocketMediaSettings $mediaSettings
     * @phpstan-param WpRocketPreloadSettings $preloadSettings
     * @phpstan-param WpRocketDatabaseSettings $databaseSettings
     * @phpstan-param WpRocketCdnSettings $cdnSettings
     * @phpstan-param WpRocketHeartbeatSettings $heartbeatSettings
     */
    public function __construct(
        array $cacheSettings,
        array $cssSettings,
        array $javaScriptSettings,
        array $mediaSettings,
        array $preloadSettings,
        array $databaseSettings,
        array $cdnSettings,
        array $heartbeatSettings
    ) {
        $this->cacheSettings = $cacheSettings;
        $this->cssSettings = $cssSettings;
        $this->javaScriptSettings = $javaScriptSettings;
        $this->mediaSettings = $mediaSettings;
        $this->preloadSettings = $preloadSettings;
        $this->databaseSettings = $databaseSettings;
        $this->cdnSettings = $cdnSettings;
        $this->heartbeatSettings = $heartbeatSettings;
    }

    public function registerCallbacks(): void
    {
        $settings = array_merge(
            $this->cacheSettings,
            $this->cssSettings,
            $this->javaScriptSettings,
            $this->mediaSettings,
            $this->preloadSettings,
            $this->databaseSettings,
            $this->cdnSettings,
            $this->heartbeatSettings
        );
        foreach ($settings as $key => $setting) {
            add_filter('pre_get_rocket_option_' . $key, fn() => $this->getSetting(
                $key,
                $setting
            ));
        }
    }

    /**
     * @param mixed $setting
     * @return mixed
     */
    public function getSetting(string $key, $setting)
    {
        switch ($key) {
            case 'async_css':
                return $this->getAsyncCssSetting((bool)$setting);
            case 'automatic_cleanup_frequency':
                return $this->getAutomaticCleanupFrequencySetting($setting);
            case 'heartbeat_admin_behavior':
            case 'heartbeat_editor_behavior':
            case 'heartbeat_site_behavior':
                return $this->getHeartBeatSetting($setting);
            case 'minify_concatenate_css':
                return $this->getMinifyConcatenateCssSetting((bool)$setting);
            case 'minify_concatenate_js':
                return $this->getMinifyConcatenateJsSetting((bool)$setting);
            default:
                return $setting;
        }
    }

    private function getAsyncCssSetting(bool $setting): bool
    {
        return isset($this->cssSettings['remove_unused_css']) && $this->cssSettings['remove_unused_css'] === true
            ? false
            : $setting;
    }

    /**
     * @param mixed $setting
     */
    private function getAutomaticCleanupFrequencySetting($setting): string
    {
        switch ($setting) {
            case 1:
                return 'daily';
            case 3:
                return 'monthly';
            case 2:
            default:
                return 'weekly';
        }
    }

    /**
     * @param mixed $setting
     */
    private function getHeartBeatSetting($setting): string
    {
        switch ($setting) {
            case 1:
                return 'reduce_periodicity';
            case 2:
                return 'disable';
            default:
                return '';
        }
    }

    private function getMinifyConcatenateCssSetting(bool $setting): bool
    {
        return isset($this->cssSettings['minify_css']) && $this->cssSettings['minify_css'] !== true
            ? false
            : $setting;
    }

    private function getMinifyConcatenateJsSetting(bool $setting): bool
    {
        return isset($this->javaScriptSettings['minify_js']) && $this->javaScriptSettings['minify_js'] !== true
            ? false
            : $setting;
    }
}
