<?php
/**
 * Template Name: Project Listing
 */

get_header(); ?>

<div class="wrapper listing">
<div class="grid grid-2">
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'projects',
    'posts_per_page' => 10,
    'paged' => $paged,
];
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('components/project-card');
    endwhile;

    wp_reset_postdata();
else : ?>
  <p>
    <?php esc_html_e('No projects found.', 'idm250-2025'); ?>
  </p>
  <?php endif; ?>
</div>
</div>
<?php get_footer(); ?>