<?php

namespace Jascha030\SequoiaTheme;

use Jascha030\PluginLib\Plugin\ConfigurablePluginApiRegistry;

final class ThemeContainer extends ConfigurablePluginApiRegistry
{
    public function __construct(string $pluginFile, string $configPath = null)
    {
        parent::__construct('WP Sequoia Theme', $pluginFile, $configPath);
    }
}
