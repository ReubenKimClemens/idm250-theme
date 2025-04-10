<?php 
get_header(); 


$args = array(
    'post_type' => 'projects', // or 'project', 'portfolio', etc.
    'tax_query' => array(
        array(
            'taxonomy' => 'project_type',
            'field'    => 'slug',
            'terms'    => 'solo', // or 'team'
        ),
    ),
);
?>
    
<div class="wrapper">
    <div class="project-info">
        <h1><?php echo get_the_title(); ?></h1>
        <p>Published on <?php the_date(); ?> in <?php echo get_the_term_list(get_the_ID(), // 204
            'project-categories', // taxonomy name
            '', // before
            ', ', // separator
            '' // after
            ); ?>
        </p>

        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php get_template_part('components/content'); ?>      
</div>


<?php get_footer(); ?>