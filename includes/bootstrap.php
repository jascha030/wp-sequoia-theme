<?php

/**
 * Bootstrap file.
 */
declare(strict_types=1);

/*
 * Get theme dir.
 */
use Jascha030\PluginLib\Exception\Psr11\DoesNotImplementHookableInterfaceException;
use Jascha030\PluginLib\Exception\Psr11\DoesNotImplementProviderInterfaceException;
use Jascha030\SequoiaTheme\ThemeContainer;

$theme_dir = apply_filters('wp_sq_theme_directory', '');

/**
 * Get static method that returns autoload.php path.
 */
$loader = include __DIR__.'/loader.php';

/**
 * Require autoload.php.
 */
require_once $loader($theme_dir);

/** @noinspection ForgottenDebugOutputInspection */
function app()
{
    static $app;

    if (!isset($app)) {
        $app = new ThemeContainer(
            WP_SQ_THEME_FILE,
            WP_SQ_THEME_DIR.'/config'
        );

        try {
            $app->run();
        } catch (DoesNotImplementHookableInterfaceException | DoesNotImplementProviderInterfaceException $e) {
            wp_die($e->getMessage());
        }
    }

    return $app;
}

add_action('wp_sq_theme_init', 'app', 10);
