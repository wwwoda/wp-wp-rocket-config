<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Woda\WordPress\WpRocket\Settings\AdvancedRules\AlwaysPurgeUrls;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\AlwaysPurgeUrlsFactory;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\CacheQueryStrings;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\CacheQueryStringsFactory;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\NeverCacheCookies;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\NeverCacheCookiesFactory;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\NeverCacheUrls;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\NeverCacheUrlsFactory;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\NeverCacheUserAgents;
use Woda\WordPress\WpRocket\Settings\AdvancedRules\NeverCacheUserAgentsFactory;
use Woda\WordPress\WpRocket\Settings\Cdn\CdnCnames;
use Woda\WordPress\WpRocket\Settings\Cdn\CdnCnamesFactory;
use Woda\WordPress\WpRocket\Settings\Cdn\CdnRejectFiles;
use Woda\WordPress\WpRocket\Settings\Cdn\CdnRejectFilesFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CriticalCss;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CriticalCssFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CssSafelist;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\CssSafelistFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeAsyncCss;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeAsyncCssFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeCombineAndMinifyCss;
use Woda\WordPress\WpRocket\Settings\FileOptimization\Css\ExcludeCombineAndMinifyCssFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeCombineAndMinifyFileJs;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeCombineAndMinifyFileJsFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeCombineAndMinifyInlineJs;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeCombineAndMinifyInlineJsFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeDeferJs;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeDeferJsFactory;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeDelayJs;
use Woda\WordPress\WpRocket\Settings\FileOptimization\JavaScript\ExcludeDelayJsFactory;
use Woda\WordPress\WpRocket\Settings\Media\ExcludeLazyload;
use Woda\WordPress\WpRocket\Settings\Media\ExcludeLazyloadFactory;
use Woda\WordPress\WpRocket\Settings\Preload\PrefetchDnsRequests;
use Woda\WordPress\WpRocket\Settings\Preload\PrefetchDnsRequestsFactory;
use Woda\WordPress\WpRocket\Settings\Preload\PreloadFonts;
use Woda\WordPress\WpRocket\Settings\Preload\PreloadFontsFactory;
use Woda\WordPress\WpRocket\Settings\Preload\Sitemaps;
use Woda\WordPress\WpRocket\Settings\Preload\SitemapsFactory;

/**
 * @phpstan-type WpRocketCacheSettings array{
 *     'cache_mobile': bool,
 *     'do_caching_mobile_files': bool,
 *     'cache_logged_user': bool,
 *     'purge_cron_interval': int,
 *     'purge_cron_unit': 'HOUR_IN_SECONDS'|'DAY_IN_SECONDS'
 * }
 *
 * @phpstan-type WpRocketCdnSettings array{
 *     'minify_css': bool,
 *     'minify_concatenate_css': bool,
 *     'remove_unused_css': bool,
 *     'async_css': bool,
 * }
 *
 * @phpstan-type WpRocketCssSettings array{
 *     'minify_css': bool,
 *     'minify_concatenate_css': bool,
 *     'remove_unused_css': bool,
 *     'async_css': bool,
 * }
 *
 * @phpstan-type WpRocketJavaScriptSettings array{
 *     'minify_js': bool,
 *     'minify_concatenate_js': bool,
 *     'defer_all_js': bool,
 *     'delay_js': bool,
 * }
 *
 * @phpstan-type WpRocketMediaSettings array{
 *     'lazyload': bool,
 *     'lazyload_iframes': bool,
 *     'lazyload_youtube': bool,
 *     'image_dimensions': bool,
 * }
 *
 * @phpstan-type WpRocketPreloadSettings array{
 *     'manual_preload': bool,
 *     'sitemap_preload': bool,
 *     'yoast_xml_sitemap': bool,
 *     'preload_links': bool,
 * }
 *
 * @phpstan-type WpRocketDatabaseSettings array{
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
 * @phpstan-type WpRocketCdnSettings array{
 *     'cdn': bool,
 * }
 *
 * @phpstan-type WpRocketHeartbeatSettings array{
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
                    'settings' => [
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
                        'settings' => [
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
                        'settings' => [
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
                    'settings' => [
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
                    'settings' => [
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
                    'settings' => [
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
                    'settings' => [
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
                    'settings' => [
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
                    Settings::class,
                    // Advanced Rules
                    AlwaysPurgeUrls::class,
                    CacheQueryStrings::class,
                    NeverCacheCookies::class,
                    NeverCacheUrls::class,
                    NeverCacheUserAgents::class,
                    // Cdn
                    CdnCnames::class,
                    CdnRejectFiles::class,
                    // File Optimization CSS
                    CriticalCss::class,
                    CssSafelist::class,
                    ExcludeAsyncCss::class,
                    ExcludeCombineAndMinifyCss::class,
                    // File Optimization JavaScript
                    ExcludeCombineAndMinifyFileJs::class,
                    ExcludeCombineAndMinifyInlineJs::class,
                    ExcludeDeferJs::class,
                    ExcludeDelayJs::class,
                    // Media
                    ExcludeLazyload::class,
                    // Preload
                    PrefetchDnsRequests::class,
                    PreloadFonts::class,
                    Sitemaps::class,
                ],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    Settings::class => SettingsFactory::class,
                    // Advanced Rules
                    AlwaysPurgeUrls::class => AlwaysPurgeUrlsFactory::class,
                    CacheQueryStrings::class => CacheQueryStringsFactory::class,
                    NeverCacheCookies::class => NeverCacheCookiesFactory::class,
                    NeverCacheUrls::class => NeverCacheUrlsFactory::class,
                    NeverCacheUserAgents::class => NeverCacheUserAgentsFactory::class,
                    // Cdn
                    CdnCnames::class => CdnCnamesFactory::class,
                    CdnRejectFiles::class => CdnRejectFilesFactory::class,
                    // File Optimization CSS
                    CriticalCss::class => CriticalCssFactory::class,
                    CssSafelist::class => CssSafelistFactory::class,
                    ExcludeAsyncCss::class => ExcludeAsyncCssFactory::class,
                    ExcludeCombineAndMinifyCss::class => ExcludeCombineAndMinifyCssFactory::class,
                    // File Optimization JavaScript
                    ExcludeCombineAndMinifyFileJs::class => ExcludeCombineAndMinifyFileJsFactory::class,
                    ExcludeCombineAndMinifyInlineJs::class => ExcludeCombineAndMinifyInlineJsFactory::class,
                    ExcludeDeferJs::class => ExcludeDeferJsFactory::class,
                    ExcludeDelayJs::class => ExcludeDelayJsFactory::class,
                    // Media
                    ExcludeLazyload::class => ExcludeLazyloadFactory::class,
                    // Preload
                    PrefetchDnsRequests::class => PrefetchDnsRequestsFactory::class,
                    PreloadFonts::class => PreloadFontsFactory::class,
                    Sitemaps::class => SitemapsFactory::class,
                ],
            ],
        ];
    }
}
