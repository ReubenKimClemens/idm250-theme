<article class="project-card">
    <a href="<?php the_permalink(); ?>" class="project-card__link">

        <div class="project-card__content">
            <h3 class="project-card__team-status">
                <?php
                $terms = get_the_terms(get_the_ID(), 'project_type');

                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo 'Project Type: ' . esc_html($term->name);
                    }
                } else {
                    echo 'No project type assigned.';
                }
                ?>
            </h3>
            <h2 class="project-card__title"><?php the_title(); ?></h2>
        </div>
        <?php if (has_post_thumbnail()) : ?>
        <div class="project-card__image-wrapper">
            <?php the_post_thumbnail('large', ['class' => 'project-card__image']); ?>
        </div>
        <?php endif; ?>
        <div class="project-card__content">
            <p class="project-card__description">
                <?php
                $paragraph = get_post_meta(get_the_ID(), '_project_paragraph', true);

                if (!empty($paragraph)) {
                    echo '<div class="project-paragraph"><p>' . esc_html($paragraph) . '</p></div>';
                }
                ?>
            </p>
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