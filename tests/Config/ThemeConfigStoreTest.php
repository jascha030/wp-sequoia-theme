<?php

namespace Jascha030\SequoiaTheme\Tests\Config;

use Jascha030\ConfigurationLib\Config\ConfigStoreInterface;
use Jascha030\SequoiaTheme\Config\ThemeConfigStore;
use Jascha030\SequoiaTheme\Config\ThemeConfigurationsInterface;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ThemeConfigStoreTest extends TestCase
{
    public function testConstruction(): ThemeConfigurationsInterface
    {
        $store = new ThemeConfigStore(\dirname(__FILE__, 2).'/Fixtures/configDirectory');
        $store = $store->load();

        self::assertInstanceOf(ConfigStoreInterface::class, $store);
        self::assertInstanceOf(ThemeConfigurationsInterface::class, $store);

        return $store;
    }

    /**
     * @depends testConstruction
     */
    public function testGetThemeSupports(ThemeConfigurationsInterface $store): void
    {
        self::assertTrue($store->getThemeSupports()['test-feature-1']);
        self::assertFalse($store->getThemeSupports()['test-feature-2']);
    }

    /**
     * @depends testConstruction
     */
    public function testGetConstants(ThemeConfigurationsInterface $store): void
    {
        self::assertTrue($store->getConstants()['TEST_CONSTANT']);
    }

    /**
     * @depends testConstruction
     */
    public function testGetFilterRemovals(ThemeConfigurationsInterface $store): void
    {
        self::assertIsArray($store->getFilterRemovals());
        self::assertArrayHasKey('actions', $store->getFilterRemovals());
        self::assertArrayHasKey('filters', $store->getFilterRemovals());
    }
}
