<?php get_header(); ?>


<main class="post-container">
        <article class="post">
            <h1 class="post-title"><?php echo get_the_title(); ?></h1>
            <p class="post-meta">Published on <?php the_date(); ?> in <?php the_category(', '); ?></p>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <!-- added featured image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            
            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <?php get_template_part('components/author-box'); ?>
        
    </div>
            <!-- <div class="post-tags">
                <?php the_tags('Tags: ', ', '); ?>
            </div> -->
        </article>
</main>

<?php get_footer(); ?>