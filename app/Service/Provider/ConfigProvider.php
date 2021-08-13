<?php

namespace Jascha\SequoiaTheme\Service\Provider;

use Jascha030\SequoiaTheme\Config\ThemeConfigStore;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

final class ConfigProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $pimple): void
    {
        $pimple[ThemeConfigStore::class] = static function (Container $container) {
            return new ThemeConfigStore(\dirname(__FILE__, 4).'/config');
        };
    }
}
