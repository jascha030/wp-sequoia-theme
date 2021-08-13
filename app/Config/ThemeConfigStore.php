<?php

namespace Jascha030\SequoiaTheme\Config;

use Jascha030\ConfigurationLib\Config\ConfigStore;
use Jascha030\ConfigurationLib\Config\ConfigStoreInterface;

final class ThemeConfigStore extends ConfigStore implements ThemeConfigurationsInterface
{
    private bool $loaded = false;

    /**
     * {@inheritdoc}
     */
    public function getThemeSupports(): array
    {
        return $this->conditionallyLoad()->getConfig('supports');
    }

    /**
     * {@inheritdoc}
     */
    public function getFilterRemovals(): array
    {
        return $this->conditionallyLoad()->getConfig('removals');
    }

    /**
     * {@inheritdoc}
     */
    public function getConstants(): array
    {
        return $this->conditionallyLoad()->getConfig('constants');
    }

    public function getComponentHooks(): array
    {
        return $this->conditionallyLoad()->getConfig('components');
    }

    private function conditionallyLoad(): ConfigStoreInterface
    {
        if (true !== $this->loaded) {
            $this->loaded = true;

            return $this->load();
        }

        return $this;
    }
}
