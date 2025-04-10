<?php
/* 
*  Template Name: About     
*/


?>

<?php get_header(); ?>
<div class="wrapper">
    <?php get_template_part('components/content'); ?>
    <?php
$front_page_id = get_option('page_on_front'); // Gets the ID of the static front page
$menu_paragraph = get_post_meta($front_page_id, 'about_paragraph', true);

if ($menu_paragraph) {
    echo '<p class="menu-paragraph">' . $menu_paragraph . '</p>';
}
?>
</div>

<?php get_footer(); ?>