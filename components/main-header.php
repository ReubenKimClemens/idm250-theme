<header class="header">
    <div class="header__logo">
        <?php if (has_custom_logo()) : ?>
        <div class="site-logo">
        <?php the_custom_logo(); ?>

        
        </div>
        <?php else: ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
        <?php bloginfo('name'); ?>
        </a>
        <?php endif; ?>
    </div>
    
    <button class="menu-toggle" aria-label="Toggle Menu">☰</button>
    <nav class="nav">
        <ul>
            <li>Project
                <ul>
                    <li>item 1</li>
                    <li>item 2</li>
                </ul>
            </li>
            <li>Resume</li>
            <li>About</li>
            <li>Contact</li>
        </ul>
    </nav>
    <!-- <nav class="nav">
        
    </nav> -->
</header>