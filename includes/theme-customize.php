<?php

/**
 * Enable support for a custom logo.
 *
 * This function allows users to set a custom logo via the WordPress Customizer.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
 */
function theme_add_logo()
{
    add_theme_support('custom-logo', [
        'height' => 100,
        'width' => 100,
        'flex-width' => true, // Allows width resizing
        'flex-height' => true, // Allows height resizing
    ]);
}
add_action('after_setup_theme', 'theme_add_logo');

/**
 * Registers Theme Customizer settings.
 *
 * - Adds color options for primary and secondary theme colors.
 * - Enables custom logo support.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */
function mytheme_customize_register($wp_customize)
{
    // Add a section for theme colors
    $wp_customize->add_section('theme_colors', [
        'title' => __('Theme Colors', 'mytheme'),
        'priority' => 30,
    ]);

    // Define color settings
    $colors = [
        'primary_color' => [
            'label' => __('Primary Color', 'mytheme'),
            'default' => '#000000',
        ],
        'secondary_color' => [
            'label' => __('Secondary Color', 'mytheme'),
            'default' => '#0066ff',
        ],
    ];

    // Loop through colors to add settings and controls
    foreach ($colors as $color_id => $color) {
        $wp_customize->add_setting($color_id, [
            'default' => $color['default'],
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            $color_id,
            [
                'label' => $color['label'],
                'section' => 'theme_colors',
                'settings' => $color_id,
            ]
        ));
    }
}
add_action('customize_register', 'mytheme_customize_register');

/**
 * Outputs dynamic theme colors to the site's CSS.
 *
 * Injects `--primary-color` and `--secondary-color` into the CSS variables.
 */
function mytheme_customizer_css()
{
    ?>
<style>
:root {
  --primary-color:
    <?php echo esc_attr(get_theme_mod('primary_color', '#ff6600'));
  ?>;
  --secondary-color:
    <?php echo esc_attr(get_theme_mod('secondary_color', '#0066ff'));
  ?>;
}
</style>
<?php
}
add_action('wp_head', 'mytheme_customizer_css');

/**
 * Retrieve a custom WordPress menu.
 *
 * This function gets menu items for a specified theme location.
 *
 * @param string $theme_location The menu location slug.
 * @return array The menu items or an empty array if no menu is assigned.
 */
function get_custom_wp_menu($theme_location)
{
    if (!has_nav_menu($theme_location)) {
        return []; // Return empty array if no menu is assigned
    }

    $locations = get_nav_menu_locations();
    return wp_get_nav_menu_items($locations[$theme_location]) ?: [];
}

/**
 * Customize the WordPress login page with a custom logo.
 *
 * This function changes the login page background color and logo.
 */
function login_page_custom_logo()
{
    ?>
<style>
body.login {
  background-color: #f3f3f3;
}

.login h1 a {
  background-image: url('<?php echo esc_url(get_stylesheet_directory_uri() . '/dist/images/logo.webp'); ?>') !important;
}
</style>
<?php
}
add_action('login_enqueue_scripts', 'login_page_custom_logo');