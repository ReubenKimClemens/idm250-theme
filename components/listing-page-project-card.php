<article class="project-card">
    <a href="<?php the_permalink(); ?>" class="project-card__link">

        <div class="project-card__content">
            <h2 class="project-card__title"><?php the_title(); ?></h2>
        </div>
        <?php if (has_post_thumbnail()) : ?>
        <div class="project-card__image-wrapper">
            <?php the_post_thumbnail('large', ['class' => 'project-card__image']); ?>
        </div>
        <?php endif; ?>
        <div class="project-card__content">
            <p><?php echo get_the_term_list(get_the_ID(), // 204
            'project-categories', // taxonomy name
            '', // before
            ', ', // separator
            '' // after
            ); ?>
        </p>
        </div>
    </a>
</article>