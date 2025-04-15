<?php
/* 
*  Template Name: About     
*/


?>

<?php get_header(); ?>
<div class="wrapper">

    <?php
        get_template_part('components/about-me-description');
        echo '<hr>';
        echo "<h1 class='about-me-title'>About Me</h1>";
        get_template_part('components/content');
    ?>
</div>

<?php get_footer(); ?>