<?php

/**
 * Enable support for Post Thumbnails (Featured Images).
 *
 * This allows adding featured images to posts and pages.
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
add_theme_support('post-thumbnails');

/**
 * Enable excerpt support for pages.
 *
 * By default, pages do not support excerpts, so we add it manually.
 */
add_post_type_support('page', 'excerpt');

/**
 * Enqueue theme styles and scripts.
 *
 * This function loads stylesheets and JavaScript files needed for the theme.
 * @return void
 */
function theme_scripts_and_styles()
{
    // Normalize.css for consistent styling across browsers
    wp_enqueue_style(
        'idm-normalize',
        'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css',
        [],
        '8.0.1' // Version number for cache-busting
    );

    // Main theme stylesheet with cache-busting based on file modification time
    wp_enqueue_style(
        'idm-main',
        get_template_directory_uri() . '/dist/styles/main.css',
        [],
        filemtime(get_template_directory() . '/dist/styles/main.css') // Prevents caching issues
    );

    // Main theme JavaScript file, loaded in the footer for performance
    wp_enqueue_script(
        'idm-main-script',
        get_template_directory_uri() . '/dist/scripts/main.js',
        [],
        filemtime(get_template_directory() . '/dist/scripts/main.js'), // Prevents caching issues
        true // Load in the footer
    );
}
add_action('wp_enqueue_scripts', 'theme_scripts_and_styles');