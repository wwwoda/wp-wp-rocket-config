<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket\Settings;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

class InlineScriptFactory
{
    public function __invoke(ContainerInterface $container): InlineScript
    {
        $config = Config::get($container);
        return new InlineScript($config->string('wp_rocket/disabled_field_classname'));
    }
}
