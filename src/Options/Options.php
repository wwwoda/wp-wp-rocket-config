<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings\Options;

use Woda\WordPress\Hook\HookCallbackProviderInterface;
use Woda\WordPress\WpRocket\Settings\ConfigProvider;

use function array_merge;

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
class Options implements HookCallbackProviderInterface
{
    /** @phpstan-var WpRocketCacheOptions  */
    private array $cacheOptions;
    /** @phpstan-var WpRocketCssOptions */
    private array $cssOptions;
    /** @phpstan-var WpRocketJavaScriptOptions */
    private array $javaScriptOptions;
    /** @phpstan-var WpRocketMediaOptions */
    private array $mediaOptions;
    /** @phpstan-var WpRocketPreloadOptions */
    private array $preloadOptions;
    /** @phpstan-var WpRocketDatabaseOptions */
    private array $databaseOptions;
    /** @phpstan-var WpRocketCdnOptions */
    private array $cdnOptions;
    /** @phpstan-var WpRocketHeartbeatOptions */
    private array $heartbeatOptions;

    /**
     * @phpstan-param WpRocketCacheOptions $cacheOptions
     * @phpstan-param WpRocketCssOptions $cssOptions
     * @phpstan-param WpRocketJavaScriptOptions $javaScriptOptions
     * @phpstan-param WpRocketMediaOptions $mediaOptions
     * @phpstan-param WpRocketPreloadOptions $preloadOptions
     * @phpstan-param WpRocketDatabaseOptions $databaseOptions
     * @phpstan-param WpRocketCdnOptions $cdnOptions
     * @phpstan-param WpRocketHeartbeatOptions $heartbeatOptions
     */
    public function __construct(
        array $cacheOptions,
        array $cssOptions,
        array $javaScriptOptions,
        array $mediaOptions,
        array $preloadOptions,
        array $databaseOptions,
        array $cdnOptions,
        array $heartbeatOptions
    ) {
        $this->cacheOptions = $cacheOptions;
        $this->cssOptions = $cssOptions;
        $this->javaScriptOptions = $javaScriptOptions;
        $this->mediaOptions = $mediaOptions;
        $this->preloadOptions = $preloadOptions;
        $this->databaseOptions = $databaseOptions;
        $this->cdnOptions = $cdnOptions;
        $this->heartbeatOptions = $heartbeatOptions;
    }

    public function registerCallbacks(): void
    {
        $options = array_merge(
            $this->cacheOptions,
            $this->cssOptions,
            $this->javaScriptOptions,
            $this->mediaOptions,
            $this->preloadOptions,
            $this->databaseOptions,
            $this->cdnOptions,
            $this->heartbeatOptions
        );
        foreach ($options as $key => $value) {
            add_filter('pre_get_rocket_option_' . $key, fn() => $this->getOptionValue(
                $key,
                $value
            ));
        }
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function getOptionValue(string $key, $value)
    {
        switch ($key) {
            case 'async_css':
                return $this->getAsyncCssOption((bool)$value);
            case 'automatic_cleanup_frequency':
                return $this->getAutomaticCleanupFrequencyOption($value);
            case 'heartbeat_admin_behavior':
            case 'heartbeat_editor_behavior':
            case 'heartbeat_site_behavior':
                return $this->getHeartBeatOption($value);
            case 'minify_concatenate_css':
                return $this->getMinifyConcatenateCssOption((bool)$value);
            case 'minify_concatenate_js':
                return $this->getMinifyConcatenateJsOption((bool)$value);
            default:
                return $value;
        }
    }

    private function getAsyncCssOption(bool $value): bool
    {
        return isset($this->cssOptions['remove_unused_css']) && $this->cssOptions['remove_unused_css'] === true
            ? false
            : $value;
    }

    /**
     * @param mixed $value
     */
    private function getAutomaticCleanupFrequencyOption($value): string
    {
        switch ($value) {
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
     * @param mixed $value
     */
    private function getHeartBeatOption($value): string
    {
        switch ($value) {
            case 1:
                return 'reduce_periodicity';
            case 2:
                return 'disable';
            default:
                return '';
        }
    }

    private function getMinifyConcatenateCssOption(bool $value): bool
    {
        return isset($this->cssOptions['minify_css']) && $this->cssOptions['minify_css'] !== true
            ? false
            : $value;
    }

    private function getMinifyConcatenateJsOption(bool $value): bool
    {
        return isset($this->javaScriptOptions['minify_js']) && $this->javaScriptOptions['minify_js'] !== true
            ? false
            : $value;
    }
}
