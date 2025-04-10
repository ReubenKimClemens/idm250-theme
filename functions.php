<?php
/**
 * Theme Functions File
 *
 * This file initializes key WordPress theme features and includes external PHP files
 * to keep the theme modular and organized. Each section is responsible for a specific
 * function in the theme.
 */

/**
 * 1. Theme Initialization
 * -------------------------
 * Handles theme support features like menus, post thumbnails, and general setup.
 */
require get_template_directory() . '/includes/setup.php';

/**
 * 2. Theme API Customization
 * ----------------------------
 * Manages custom settings for the WordPress Customizer.
 */
require get_template_directory() . '/includes/theme-customize.php';

/**
 * Widget Areas & Sidebars
 *
 * This file registers the widget areas (sidebars, footer widgets, etc.) for the theme.
 * Widgets allow users to add small content blocks in specific sections of the theme.
 */

// Register the main sidebar
function add_widgets()
{
    register_sidebar([
        'name' => 'Main Sidebar',
        'id' => 'main_sidebar',
        'description' => 'Widgets in this area will be shown in the main sidebar.',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'add_widgets');

// Register additional sidebars
function register_custom_sidebar()
{
    register_sidebar([
        'name' => 'Primary Sidebar',
        'id' => 'primary-sidebar',
        'description' => 'Widgets in this area will be shown in the Primary Sidebar.',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => 'Footer Widget',
        'id' => 'footer-widget',
        'description' => 'Widgets in this area will be shown in the Footer.',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ]);
}

function get_theme_menu($menu_name)
{
    // Get menu locations
    $locations = get_nav_menu_locations();

    // Return an empty array if the menu doesn't exist
    if (!isset($locations[$menu_name])) {
        return [];
    }

    // Retrieve the menu object and items
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id, ['order' => 'DESC']);

    // Process menu items
    foreach ($menu_items as &$item) {
        // Convert classes array to a space-separated string
        $item->classes = !empty($item->classes) ? implode(' ', array_filter($item->classes)) : '';

        // Ensure target and xfn attributes are set
        $item->target = $item->target ?? '';
        $item->xfn = $item->xfn ?? '';
    }
    unset($item); // Break reference with the last item

    return $menu_items;
}

function add_paragraph_to_menu($items, $args) {
    if ($args->theme_location === 'primary') {
        $items .= '<li class="menu-paragraph" style="padding: 10px 15px;">'
                . 'This is a custom paragraph placed in the menu.'
                . '</li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_paragraph_to_menu', 10, 2);



/**
 * Register custom post types for the theme.
 *
 * This function registers a custom post type "Projects" for managing project-based content.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @return void
 */
function register_custom_post_types()
{
    $post_type_name = 'projects';

    $args = [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new' => 'Add New Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'new_item' => 'New Project',
            'view_item' => 'View Project',
            'search_items' => 'Search Projects',
            'not_found' => 'No Projects found',
            'not_found_in_trash' => 'No Projects found in Trash',
        ],
        'public' => true,             // Makes it accessible on the front and back end
        'has_archive' => true,             // Enables an archive page
        'rewrite' => ['slug' => 'projects'], // URL slug
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'], // Enabled post features
        'menu_position' => 5,                // Position in WP admin menu
        'menu_icon' => 'dashicons-portfolio', // Optional: Custom icon for the post type
        'show_in_rest' => true,             // Enables Gutenberg support
        // 'taxonomies'  => ['project-categories'], // Uncomment if you have a custom taxonomy
    ];

    register_post_type($post_type_name, $args);
}

add_action('init', 'register_custom_post_types');


function add_project_type_terms() {
    wp_insert_term('Solo', 'project_type');
    wp_insert_term('Team', 'project_type');
}
add_action('init', 'add_project_type_terms');

function add_project_paragraph_meta_box() {
    add_meta_box(
        'project_paragraph_box',
        'Project Paragraph',
        'render_project_paragraph_box',
        'projects', // your custom post type
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_project_paragraph_meta_box');

function render_project_paragraph_box($post) {
    // Retrieve current value
    $value = get_post_meta($post->ID, '_project_paragraph', true);
    // Security nonce
    wp_nonce_field('save_project_paragraph', 'project_paragraph_nonce');

    echo '<textarea style="width:100%;height:150px;" name="project_paragraph_field">' . esc_textarea($value) . '</textarea>';
}

function save_project_paragraph_meta($post_id) {
    // Check nonce
    if (!isset($_POST['project_paragraph_nonce']) ||
        !wp_verify_nonce($_POST['project_paragraph_nonce'], 'save_project_paragraph')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check user permission
    if (!current_user_can('edit_post', $post_id)) return;

    // Save field
    if (isset($_POST['project_paragraph_field'])) {
        update_post_meta($post_id, '_project_paragraph', sanitize_textarea_field($_POST['project_paragraph_field']));
    }
}
add_action('save_post', 'save_project_paragraph_meta');



/**
 * 5. Register Custom Taxonomies
 * ------------------------------
 * Defines custom taxonomies (categories/tags for CPTs).
 */
require get_template_directory() . '/includes/taxonomies.php';

