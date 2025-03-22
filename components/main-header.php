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
    
    <button class="menu-toggle js-menu-toggle" aria-label="Toggle Menu">☰</button>
    <nav class="nav">
    <?php
    wp_nav_menu([
        'theme_location' => 'primary-menu',
        'menu_class' => 'menu',
        'container' => false
    ]);
    ?>
    </nav>
<!--     
    <nav class="nav">
      <?php 
      $menu_items = get_theme_menu('primary-menu');

      // Check if menu exists and has items
      if (!empty($menu_items)) : ?>
      <ul class="menu custom-menu">
        <?php foreach ($menu_items as $item) : ?>
        <li class="menu-item <?php echo $item->classes; ?>">
          <a href="<?php echo $item->url; ?>" <?php if ($item->target) echo 'target="' . $item->target . '"'; ?>
            <?php if ($item->xfn) echo 'rel="' . $item->xfn . '"'; ?>>
            <?php echo $item->title; ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif;
      ?>
    </nav> -->
</header>