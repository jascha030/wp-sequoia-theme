<?php

/** Block usage if file is called directly */
defined('ABSPATH') || exit('Forbidden.');

/* Define global Constants. */
if (!defined('WP_SQ_THEME_DIR')) {
    define('WP_SQ_THEME_DIR', __DIR__);
    define('WP_SQ_THEME_FILE', __FILE__);
}

add_filter('wp_sq_theme_directory', static fn (): string => __DIR__, 10);

/*
 * Requires the composer autoloader.
 */
// require_once __DIR__.'/includes/bootstrap.php';

/*
 * Hook: WP_SQ_load_theme
 * Fired when bootstrap.php and theme constants are loaded.
 */
do_action('wp_sq_theme_init');
