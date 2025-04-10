<div class="home-hero">
    <div class="home-hero-content">
        <div class="logo-and-excerpt">
            <?php if (has_custom_logo()) : ?>
            <div class="home_logo">
                <?php the_custom_logo(); ?>    
            </div>
            <?php endif; ?>
            <div class="home-excerpt">
                <?php
                $front_page_id = get_option('page_on_front'); // Gets the ID of the static front page
                $menu_paragraph = get_post_meta($front_page_id, 'about_paragraph', true);
                
                if ($menu_paragraph) {
                    echo '<p class="menu-paragraph">' . $menu_paragraph . '</p>';
                }
                ?>
            </div>
        </div>
        <?php if (has_post_thumbnail()) : ?>
        <div class="front-featured-image">
            <?php the_post_thumbnail(); ?>
        </div>  
        <?php endif; ?>
    </div>
</div>