<?php
/* 
*  Template Name: Resume Template     
*/


?>

<?php get_header(); ?>
<div class="resume-wrapper">
  <h1 class="page-header">RESUME</h1>
  <?php if (has_post_thumbnail()) : ?>
  <div class="featured-image">
    <?php the_post_thumbnail(); ?>
  </div>
  <?php endif; ?>

  <?php get_template_part('components/content'); ?>
</div>

<?php get_footer(); ?>