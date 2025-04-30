<nav class="navbar">
    <div class="nav-left">
        <?php if (has_custom_logo()) : ?>
        <div class="logo">
          <?php the_custom_logo(); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="nav-menu">
    <?php 
       $menu_items = get_theme_menu('primary-menu');
 
       // Check if menu exists and has items
       if (!empty($menu_items)) : ?>
       <ul class="menu custom-menu">
         <?php foreach ($menu_items as $item) : ?>
         <li class="menu-item <?php echo $item->classes; ?>">
           <a href="<?php echo $item->url; ?>" class="nav-link" <?php if ($item->target) echo 'target="' . $item->target . '"'; ?>
             <?php if ($item->xfn) echo 'rel="' . $item->xfn . '"'; ?>>
             <?php echo $item->title; ?>
            <div class="nav-animation"></div>
           </a>
         </li>
         <?php endforeach; ?>
       </ul>
       <?php endif;
       ?>
    </div>
</nav>