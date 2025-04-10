<nav class="navbar">
    <div class="nav-left">
        <?php if (has_custom_logo()) : ?>
        <div class="logo">
            <?php the_custom_logo(); ?>
        </div>
        <h1>Reuben Clemens</h1>
    </div>
    <?php endif; ?>
    <div class="nav-menu">
    <?php
        wp_nav_menu([
            'theme_location' => 'primary-menu',
            'menu_class' => 'menu',
            'container' => false
        ]);
    ?>
    </div>
</nav>