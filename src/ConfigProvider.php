<?php

declare(strict_types=1);

namespace Woda\WordPress\WpRocket;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'hook' => [
                'provider' => [
                    WpRocketConfig::class
                ]
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    WpRocketConfig::class => WpRocketConfigFactory::class,
                ],
            ],
        ];
    }
}
