<div class="about-intro">
    <div class="about-image">
        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
            <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="about-text">
        <h1>About Me</h1>
        <?php echo get_the_excerpt(); ?>
    </div>
</div>