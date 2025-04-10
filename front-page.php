<?php
/**
 * Front Page Template
 *
 * This template controls the front page of the website.
 *
 * 🔥 **When is this file used?**
 * WordPress uses `front-page.php` when:
 *   - "A static page" is selected as the homepage in **Settings > Reading**.
 *   - It's the highest priority template for the homepage in the template hierarchy.
 *
 * 🏗️ **Template Hierarchy for the Front Page:**
 *   1. front-page.php   ✅ (this file)
 *   2. home.php         (if displaying blog posts on front page)
 *   3. page.php         (if a static page is selected and front-page.php doesn’t exist)
 *   4. index.php        (fallback)
 *
 * 💡 **Key Features:**
 * - Commonly used for custom hero sections, sliders, or homepage widgets.
 * - Can display dynamic content using `get_template_part()`.
 *
 * 🌐 **Further Reading:**
 * https://developer.wordpress.org/themes/template-files-section/front-page-template/
 *
 * @package YourThemeName
 */
?>
<?php
get_header();

get_template_part('components/hero-home');
?>
<div class="wrapper">
  <?php get_template_part('components/latest-projects'); ?>
</div>
<?php get_footer(); ?>