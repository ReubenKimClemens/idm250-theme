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