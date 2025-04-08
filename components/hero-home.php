<div class="home-hero">
    <div class="home-hero-content">
        <div class="logo-and-excerpt">
            <?php if (has_custom_logo()) : ?>
            <div class="home_logo">
                <?php the_custom_logo(); ?>    
            </div>
            <?php endif; ?>
            <div class="home-excerpt">
                <?php echo get_the_excerpt(); ?>
            </div>
        </div>
        <?php if (has_post_thumbnail()) : ?>
        <div class="front-featured-image">
            <?php the_post_thumbnail(); ?>
        </div>  
        <?php endif; ?>
    </div>
</div>