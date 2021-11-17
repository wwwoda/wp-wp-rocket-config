<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'wp-rocket' => [
                'file-optimization' => [
                    'css' => [
                        /*
                         * An array of patterns of inline JavaScript to be excluded from concatenation,
                         * for example: recaptcha
                         * @see https://docs.wp-rocket.me/article/1104-excluding-inline-js-from-combine
                         */
                        'combine-css-exclusions' => [],
                        'combine-css-exclusions-merge' => true,
                        /*
                         * Documentation missing
                         */
                        'async-css-exclusions' => [],
                        'async-css-exclusions-merge' => true,
                        /*
                         * Fallback critical CSS
                         * Provides a fallback if auto-generated critical path CSS is incomplete.
                         * @see https://docs.wp-rocket.me/article/1266-optimize-css-delivery#fallback
                         */
                        'fallback-critical-css' => '',
                        /**
                         * Array of CSS filenames, IDs or classes that should not be removed while cleaning CSS files
                         * of unused CSS.
                         * @see https://docs.wp-rocket.me/article/1529-remove-unused-css?utm_source=wp_plugin&utm_medium=wp_rocket
                         */
                        'css-safelist' => [],
                        'css-safelist-merge' => true,
                    ],
                    'js' => [
                        /*
                         * An array of patterns of inline JavaScript to be excluded from concatenation,
                         * for example: recaptcha
                         * @see https://docs.wp-rocket.me/article/1104-excluding-inline-js-from-combine
                         */
                        'combine-inline-js-exclusions' => [],
                        'combine-inline-js-exclusions-merge' => true,
                        /*
                         * An array of URLs of JavaScript files to be excluded from minification and concatenation,
                         * for example: /wp-content/themes/some-theme/(.*).js
                         */
                        'combine-file-js-exclusions' => [],
                        'combine-file-js-exclusions-merge' => true,
                        /**
                         * An array of URLs or keywords of JavaScript files to be excluded from defer,
                         * for example: /wp-content/themes/some-theme/(.*).js
                         */
                        'defer-js-exclusions' => [],
                        'defer-js-exclusions-merge' => true,
                        /*
                         * An array  URLs or keywords that can identify inline or JavaScript files to be excluded from
                         * delaying execution, for example:
                         * /jquery-?[0-9.](.*)(.min|.slim|.slim.min)?.js
                         * js-(before|after)
                         * (?:/app/|/wp/wp-includes/)(.*)
                         */
                        'delay-js-exclusions' => [],
                        'delay-js-exclusions-merge' => true,
                    ],
                ],
                'preload' => [
                    /*
                     * Array of external hosts to be prefetched (URL without "http:"),
                     * for example: //example.com
                     */
                    'prefetch-urls' => [],
                    'prefetch-urls-merge' => true,
                    /*
                     * Array of URLs of the font files to be preloaded,
                     * for example: /wp-content/themes/your-theme/assets/fonts/font-file.woff
                     */
                    'preload-fonts' => [],
                    'preload-fonts-merge' => true,
                ],
                'advanced-rules' => [
                    /*
                     * An array of URLs of pages or posts that should never be cached,
                     * for example: /example/(.*)
                     */
                    'never-cache-urls' => [],
                    'never-cache-urls-merge' => true,
                    /*
                     * An array of full or partial IDs of cookies that, when set in the visitor's browser,
                     * should prevent a page from getting cached.
                     */
                    'never-cache-cookies' => [],
                    'never-cache-cookies-merge' => true,
                    /**
                     * An array of user agent strings that should never see cached pages.
                     */
                    'never-cache-user-agents' => [],
                    'never-cache-user-agents-merge' => true,
                    /*
                     * An array of URLs you always want purged from cache whenever you update any post or page.
                     */
                    'always-purge-urls' => [],
                    /*
                     * An array of GET parameters to force caching for.
                     * @see https://docs.wp-rocket.me/article/971-caching-query-strings
                     */
                    'force-cache-query-strings' => [],
                    'force-cache-query-strings-merge' => true,
                ],
                'cdn' => [
                    /*
                     * Array of CNAMEs,
                     * for example: cdn.example.com
                     */
                    'cnames' => [],
                    /*
                     * Array URLs of files that should not get served via CDN,
                     * for example: /wp-content/plugins/some-plugin/(.*).css
                     */
                    'cdn-file-exclusions' => [],
                    'cdn-file-exclusions-merge' => true,
                ],
            ],
            'hook' => [
                'provider' => [
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeCombineAndMinifyCss::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CriticalCss::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CssSafelist::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeAsyncCss::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeCombineAndMinifyInlineJs::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeCombineAndMinifyFileJs::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeDeferJs::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeDelayJs::class,
                    \Woda\WordPress\WpRocket\Settings\Preload\PrefetchDnsRequests::class,
                    \Woda\WordPress\WpRocket\Settings\Preload\PreloadFonts::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheUrls::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheCookies::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheUserAgents::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\AlwaysPurgeUrls::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ForceCacheQueryStrings::class,
                    \Woda\WordPress\WpRocket\Settings\Cdn\CdnCnames::class,
                    \Woda\WordPress\WpRocket\Settings\Cdn\CdnRejectFiles::class,
                ],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeCombineAndMinifyCss::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeCombineAndMinifyCssFactory::class, // phpcs:ignore Generic.Files.LineLength
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CriticalCss::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CriticalCssFactory::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CssSafelist::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CssSafelistFactory::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeAsyncCss::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeAsyncCssFactory::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeCombineAndMinifyInlineJs::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeCombineAndMinifyInlineJsFactory::class, // phpcs:ignore Generic.Files.LineLength
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeCombineAndMinifyFileJs::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeCombineAndMinifyFileJsFactory::class, // phpcs:ignore Generic.Files.LineLength
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeDeferJs::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeDeferJsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeDelayJs::class
                        => \Woda\WordPress\WpRocket\Settings\FileOptimization\Js\ExcludeDelayJsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\Preload\PrefetchDnsRequests::class
                        => \Woda\WordPress\WpRocket\Settings\Preload\PrefetchDnsRequestsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\Preload\PreloadFonts::class
                        => \Woda\WordPress\WpRocket\Settings\Preload\PreloadFontsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheUrls::class
                        => \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheUrlsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheCookies::class
                        => \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheCookiesFactory::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheUserAgents::class
                        => \Woda\WordPress\WpRocket\Settings\AdvancedRules\ExcludeCacheUserAgentsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\AlwaysPurgeUrls::class
                        => \Woda\WordPress\WpRocket\Settings\AdvancedRules\AlwaysPurgeUrlsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\AdvancedRules\ForceCacheQueryStrings::class
                        => \Woda\WordPress\WpRocket\Settings\AdvancedRules\ForceCacheQueryStringsFactory::class,
                    \Woda\WordPress\WpRocket\Settings\Cdn\CdnCnames::class
                        => \Woda\WordPress\WpRocket\Settings\Cdn\CdnCnamesFactory::class,
                    \Woda\WordPress\WpRocket\Settings\Cdn\CdnRejectFiles::class
                        => \Woda\WordPress\WpRocket\Settings\Cdn\CdnRejectFilesFactory::class,
                ],
            ],
        ];
    }
}
