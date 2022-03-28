<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Woda\WordPress\Hook\HookCallbackProviderInterface;

class InlineScript implements HookCallbackProviderInterface
{
    private string $disableFieldClass;

    public function __construct(string $disableFieldClass)
    {
        $this->disableFieldClass = $disableFieldClass;
    }

    public function registerCallbacks(): void
    {
        if (!defined('WP_ROCKET_PLUGIN_SLUG')) {
            return;
        }
        add_action('admin_print_styles-settings_page_' . WP_ROCKET_PLUGIN_SLUG, [$this, 'addInlineScript']);
    }

    public function addInlineScript(): void
    {
        wp_add_inline_script('wpr-admin', $this->getInlineScript());
        wp_add_inline_style('wpr-admin', $this->getInlineStyle());
    }

    private function getInlineScript(): string
    {
        return sprintf(
            'document.querySelectorAll(".%1$s textarea").forEach(function(input){input.disabled=true;})',
            $this->disableFieldClass
        );
    }

    private function getInlineStyle(): string
    {
        return sprintf(
            '.%s .wpr-textarea textarea[disabled] { background-color:rgba(0,0,0,.07); }',
            $this->disableFieldClass
        );
    }
}
