<?php

/**
 * Bootstrap file.
 */
declare(strict_types=1);

/**
 * Get theme dir.
 */
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
        // todo: wp-plugin-lib class
    }

    return $app;
}

add_action('wp_sq_theme_init', 'app', 10);
