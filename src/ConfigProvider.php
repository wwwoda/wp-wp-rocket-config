<?php

// phpcs:disable SlevomatCodingStandard.Namespaces.UseFromSameNamespace.UseFromSameNamespace


declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Woda\WordPress\WpRocket\Settings\AdvancedRules;
use Woda\WordPress\WpRocket\Settings\Cdn;
use Woda\WordPress\WpRocket\Settings\FileOptimization;
use Woda\WordPress\WpRocket\Settings\Media;
use Woda\WordPress\WpRocket\Settings\Options;
use Woda\WordPress\WpRocket\Settings\Preload;

/**
 * @phpstan-type WpRocketCacheOptions array{
 *     'cache_mobile': bool,
 *     'do_caching_mobile_files': bool,
 *     'cache_logged_user': bool,
 *     'purge_cron_interval': int,
 *     'purge_cron_unit': 'HOUR_IN_SECONDS'|'DAY_IN_SECONDS'
 * }
 *
 * @phpstan-type WpRocketCdnOptions array{
 *     'minify_css': bool,
 *     'minify_concatenate_css': bool,
 *     'remove_unused_css': bool,
 *     'async_css': bool,
 * }
 *
 * @phpstan-type WpRocketCssOptions array{
 *     'minify_css': bool,
 *     'minify_concatenate_css': bool,
 *     'remove_unused_css': bool,
 *     'async_css': bool,
 * }
 *
 * @phpstan-type WpRocketJavaScriptOptions array{
 *     'minify_js': bool,
 *     'minify_concatenate_js': bool,
 *     'defer_all_js': bool,
 *     'delay_js': bool,
 * }
 *
 * @phpstan-type WpRocketMediaOptions array{
 *     'lazyload': bool,
 *     'lazyload_iframes': bool,
 *     'lazyload_youtube': bool,
 *     'image_dimensions': bool,
 * }
 *
 * @phpstan-type WpRocketPreloadOptions array{
 *     'manual_preload': bool,
 *     'sitemap_preload': bool,
 *     'yoast_xml_sitemap': bool,
 *     'preload_links': bool,
 * }
 *
 * @phpstan-type WpRocketDatabaseOptions array{
 *     'database_revisions': bool,
 *     'database_auto_drafts': bool,
 *     'database_trashed_posts': bool,
 *     'database_spam_comments': bool,
 *     'database_trashed_comments': bool,
 *     'database_all_transients': bool,
 *     'database_optimize_tables': bool,
 *     'schedule_automatic_cleanup': bool,
 *     'automatic_cleanup_frequency': 1|2|3,
 * }
 *
 * @phpstan-type WpRocketCdnOptions array{
 *     'cdn': bool,
 * }
 *
 * @phpstan-type WpRocketHeartbeatOptions array{
 *     'control_heartbeat': bool,
 *     'heartbeat_admin_behavior': 1|2|3,
 *     'heartbeat_editor_behavior': 1|2|3,
 *     'heartbeat_site_behavior': 1|2|3,
 * }
 */
final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'wp_rocket' => [
                'cache' => [
                    'options' => [
                        /*
                         * Enable caching for mobile devices
                        */
//                        'cache_mobile' => true,
                        /*
                         * Separate cache files for mobile devices
                        */
//                        'do_caching_mobile_files' => false,
                        /*
                         * Enable caching for logged-in WordPress users
                        */
//                        'cache_logged_user' => false,
                        /*
                         * Cache Lifespan Time after which the global cache is cleared (0 = unlimited )
                        */
//                        'purge_cron_interval' => 10,
                        /*
                         * Set cron interval unit to 'HOUR_IN_SECONDS' or 'DAY_IN_SECONDS'
                        */
//                        'purge_cron_unit' => 'HOUR_IN_SECONDS',
                    ],
                ],
                'file_optimization' => [
                    'css' => [
                        'options' => [
                            /*
                             * Minify CSS files
                             * Set exclusions via 'combine_css_exclusions'
                             */
//                            'minify_css' => true,
                            /*
                             * Combine CSS files (works only if minify_css is true)
                             * Set exclusions via 'combine_css_exclusions'
                             */
//                            'minify_concatenate_css' => true,
                            /*
                             * Optimize CSS delivery - Remove unused CSS (overrides 'async_css' if true)
                             * Set CSS safelist via 'css_safelist'
                             */
//                            'remove_unused_css' => true,
                            /*
                             * Optimize CSS delivery - Load CSS asynchronously
                             * Set Fallback critical CSS via 'fallback_critical_css'
                             */
//                            'async_css' => true,
                        ],
                        /*
                         * An array of patterns of inline JavaScript to be excluded from concatenation,
                         * for example: recaptcha
                         * @see https://docs.wp-rocket.me/article/1104-excluding-inline-js-from-combine
                         */
                        'combine_css_exclusions' => [],
                        'combine_css_exclusions_merge' => true,
                        /*
                         * Documentation missing
                         */
                        'async_css_exclusions' => [],
                        'async_css_exclusions_merge' => true,
                        /**
                         * Array of CSS filenames, IDs or classes that should not be removed while cleaning CSS files
                         * of unused CSS.
                         * @see https://docs.wp-rocket.me/article/1529-remove-unused-css?utm_source=wp_plugin&utm_medium=wp_rocket
                         */
                        'css_safelist' => [],
                        'css_safelist_merge' => true,
                        /*
                         * Fallback critical CSS
                         * Provides a fallback if auto-generated critical path CSS is incomplete.
                         * @see https://docs.wp-rocket.me/article/1266-optimize-css-delivery#fallback
                         */
                        'fallback_critical_css' => '',
                    ],
                    'js' => [
                        'options' => [
                            /*
                             * Minify JavaScript files
                             * Set exclusions 'combine_file_js_exclusions'
                             */
//                            'minify_js' => true,
                            /*
                             * Combine JavaScript files (works only if minify_js is true)
                             * Set exclusions via 'combine_file_js_exclusions' and combine_inline_js_exclusions
                             */
//                            'minify_concatenate_js' => true,
                            /*
                             * Lead JavaScript deferred
                             * Set exclusions via 'defer_js_exclusions'
                             */
//                            'defer_all_js' => true,
                            /*
                             * Delay JavaScript execution
                             * Set exclusions via 'delay_js_exclusions'
                             */
//                            'delay_js' => true,
                        ],
                        /*
                         * An array of patterns of inline JavaScript to be excluded from concatenation,
                         * for example: recaptcha
                         * @see https://docs.wp-rocket.me/article/1104-excluding-inline-js-from-combine
                         */
                        'combine_inline_js_exclusions' => [],
                        'combine_inline_js_exclusions_merge' => true,
                        /*
                         * An array of URLs of JavaScript files to be excluded from minification and concatenation,
                         * for example: /wp-content/themes/some-theme/(.*).js
                         */
                        'combine_file_js_exclusions' => [],
                        'combine_file_js_exclusions_merge' => true,
                        /**
                         * An array of URLs or keywords of JavaScript files to be excluded from defer,
                         * for example: /wp-content/themes/some-theme/(.*).js
                         */
                        'defer_js_exclusions' => [],
                        'defer_js_exclusions_merge' => true,
                        /*
                         * An array  URLs or keywords that can identify inline or JavaScript files to be excluded from
                         * delaying execution, for example:
                         * /jquery-?[0-9.](.*)(.min|.slim|.slim.min)?.js
                         * js-(before|after)
                         * (?:/app/|/wp/wp-includes/)(.*)
                         */
                        'delay_js_exclusions' => [],
                        'delay_js_exclusions_merge' => true,
                    ],
                ],
                'media' => [
                    'options' => [
                        /*
                         * Enable LazyLoad for images
                         */
//                        'lazyload' => true,
                        /*
                         * Enable LazyLoad for iframes and video
                         */
//                        'lazyload_iframes' => true,
                        /*
                         * Replace YouTube iframe with preview image
                         */
//                        'lazyload_youtube' => true,
                        /*
                         * Add missing width and height attributes to images.
                         */
//                        'image_dimensions' => true,
                    ],
                    /*
                     * Array of keywords (e.g. image filename, CSS class, domain) from the image or iframe code to be
                     * excluded, for example
                     * example-image.jpg
                     * slider-image
                     */
                    'exclude_lazyload' => [],
                    'exclude_lazyload_merge' => true,
                ],
                'preload' => [
                    'options' => [
                        /*
                         * Activate Preloading
                         */
//                        'manual_preload' => true,
                        /*
                         * Activate sitemap-based cache preloading
                         */
//                        'sitemap_preload' => true,
                        /*
                         * Yoast SEO XML sitemap
                         */
//                        'yoast_xml_sitemap' => true,
                        /*
                         * Enable link preloading
                         */
//                        'preload_links' => true,
                    ],
                    /*
                     * Sitemaps for preloading,
                     * for example: https://example.com/sitemap.xml
                     */
                    'sitemaps' => [],
                    'sitemaps_merge' => true,
                    /*
                     * Prefetch DNS Requests
                     * Array of external hosts to be prefetched (URL without "http:"),
                     * for example: //example.com
                     */
                    'prefetch_urls' => [],
                    'prefetch_urls_merge' => true,
                    /*
                     * Preload Fonts
                     * Array of URLs of the font files to be preloaded,
                     * for example: /wp-content/themes/your-theme/assets/fonts/font-file.woff
                     */
                    'preload_fonts' => [],
                    'preload_fonts_merge' => true,
                ],
                'advanced_rules' => [
                    /*
                     * An array of URLs of pages or posts that should never be cached,
                     * for example: /example/(.*)
                     */
                    'never_cache_urls' => [],
                    'never_cache_urls_merge' => true,
                    /*
                     * An array of full or partial IDs of cookies that, when set in the visitor's browser,
                     * should prevent a page from getting cached.
                     */
                    'never_cache_cookies' => [],
                    'never_cache_cookies_merge' => true,
                    /**
                     * An array of user agent strings that should never see cached pages.
                     */
                    'never_cache_user_agents' => [],
                    'never_cache_user_agents_merge' => true,
                    /*
                     * An array of URLs you always want purged from cache whenever you update any post or page.
                     */
                    'always_purge_urls' => [],
                    'always_purge_urls_merge' => true,
                    /*
                     * An array of GET parameters to force caching for.
                     * @see https://docs.wp-rocket.me/article/971-caching-query-strings
                     */
                    'force_cache_query_strings' => [],
                    'force_cache_query_strings_merge' => true,
                ],
                'database' => [
                    'options' => [
                        /*
                         * Post Cleanup - Revisions
                         */
//                        'database_revisions' => true,
                        /*
                         * Post Cleanup - Auto Drafts
                         */
//                        'database_auto_drafts' => true,
                        /*
                         * Post Cleanup - Trashed Posts
                         */
//                        'database_trashed_posts' => true,
                        /*
                         * Comments Cleanup - Spam Comments
                         */
//                        'database_spam_comments' => true,
                        /*
                         * Comments Cleanup - Trashed Comments
                         */
//                        'database_trashed_comments' => true,
                        /*
                         * Transients Cleanup - All transients
                         */
//                        'database_all_transients' => true,
                        /*
                         * Database Cleanup - Optimize tables
                         */
//                        'database_optimize_tables' => true,
                        /*
                         * Schedule automatic cleanup
                         */
//                        'schedule_automatic_cleanup' => true,
                        /*
                         * Automatic cleanup frequency
                         * 1 = 'daily'
                         * 2 = 'weekly'
                         * 3 = 'monthly'
                         */
//                        'automatic_cleanup_frequency' => 2,
                    ],
                ],
                'cdn' => [
                    'options' => [
                        /*
                         * Enable CDN
                         */
//                        'cdn' => true,
                    ],
                    /*
                     * CDN CNAME(s)
                     * Format: string or [string, 'all'|'images'|'css_and_js'|'js'|'css']
                     * You must set lock_cnames to true for this setting to take effect. Merging is not available.
                     */
                    'lock_cnames' => false,
                    'cnames' => [
//                        'cdn.example.com',
//                        ['cdn.example.com', 'css_and_js']
                    ],
                    /*
                     * Array URLs of files that should not get served via CDN,
                     * for example: /wp-content/plugins/some-plugin/(.*).css
                     */
                    'cdn_file_exclusions' => [],
                    'cdn_file_exclusions_merge' => true,
                ],
                'heartbeat' => [
                    'options' => [
                        /*
                         * Control heartbeat
                         */
//                        'control_heartbeat' => true,
                        /*
                         * Behavior in backend
                         * 0 = Do not limit
                         * 1 = Reduce activity
                         * 2 = Disable
                         */
//                        'heartbeat_admin_behavior' => 1,
                        /*
                         * Behavior in post editor
                         * 0 = Do not limit
                         * 1 = Reduce activity
                         * 2 = Disable
                         */
//                        'heartbeat_editor_behavior' => 1,
                        /*
                         * Behavior in frontend
                         * 0 = Do not limit
                         * 1 = Reduce activity
                         * 2 = Disable
                         */
//                        'heartbeat_site_behavior' => 1,
                    ],
                ],
            ],
            'hook' => [
                'provider' => [
                    AdvancedRules\AlwaysPurgeUrls::class,
                    AdvancedRules\CacheQueryStrings::class,
                    AdvancedRules\NeverCacheCookies::class,
                    AdvancedRules\NeverCacheUrls::class,
                    AdvancedRules\NeverCacheUserAgents::class,
                    Cdn\CdnCnames::class,
                    Cdn\CdnRejectFiles::class,
                    FileOptimization\Css\CriticalCss::class,
                    FileOptimization\Css\CssSafelist::class,
                    FileOptimization\Css\ExcludeAsyncCss::class,
                    FileOptimization\Css\ExcludeCombineAndMinifyCss::class,
                    FileOptimization\JavaScript\ExcludeCombineAndMinifyFileJs::class,
                    FileOptimization\JavaScript\ExcludeCombineAndMinifyInlineJs::class,
                    FileOptimization\JavaScript\ExcludeDeferJs::class,
                    FileOptimization\JavaScript\ExcludeDelayJs::class,
                    Media\ExcludeLazyload::class,
                    Preload\PrefetchDnsRequests::class,
                    Preload\PreloadFonts::class,
                    Preload\Sitemaps::class,
                    Options\Options::class,
                ],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    AdvancedRules\AlwaysPurgeUrls::class => AdvancedRules\AlwaysPurgeUrlsFactory::class,
                    AdvancedRules\CacheQueryStrings::class => AdvancedRules\CacheQueryStringsFactory::class,
                    AdvancedRules\NeverCacheCookies::class => AdvancedRules\NeverCacheCookiesFactory::class,
                    AdvancedRules\NeverCacheUrls::class => AdvancedRules\NeverCacheUrlsFactory::class,
                    AdvancedRules\NeverCacheUserAgents::class => AdvancedRules\NeverCacheUserAgentsFactory::class,
                    Cdn\CdnCnames::class => Cdn\CdnCnamesFactory::class,
                    Cdn\CdnRejectFiles::class => Cdn\CdnRejectFilesFactory::class,
                    FileOptimization\Css\CriticalCss::class => FileOptimization\Css\CriticalCssFactory::class,
                    FileOptimization\Css\CssSafelist::class => FileOptimization\Css\CssSafelistFactory::class,
                    FileOptimization\Css\ExcludeAsyncCss::class => FileOptimization\Css\ExcludeAsyncCssFactory::class,
                    FileOptimization\Css\ExcludeCombineAndMinifyCss::class
                        => FileOptimization\Css\ExcludeCombineAndMinifyCssFactory::class,
                    FileOptimization\JavaScript\ExcludeCombineAndMinifyFileJs::class
                        => FileOptimization\JavaScript\ExcludeCombineAndMinifyFileJsFactory::class,
                    FileOptimization\JavaScript\ExcludeCombineAndMinifyInlineJs::class
                        => FileOptimization\JavaScript\ExcludeCombineAndMinifyInlineJsFactory::class,
                    FileOptimization\JavaScript\ExcludeDeferJs::class
                        => FileOptimization\JavaScript\ExcludeDeferJsFactory::class,
                    FileOptimization\JavaScript\ExcludeDelayJs::class
                        => FileOptimization\JavaScript\ExcludeDelayJsFactory::class,
                    Media\ExcludeLazyload::class => Media\ExcludeLazyloadFactory::class,
                    Preload\PrefetchDnsRequests::class => Preload\PrefetchDnsRequestsFactory::class,
                    Preload\PreloadFonts::class => Preload\PreloadFontsFactory::class,
                    Preload\Sitemaps::class => Preload\SitemapsFactory::class,
                    Options\Options::class => Options\OptionsFactory::class,
                ],
            ],
        ];
    }
}
