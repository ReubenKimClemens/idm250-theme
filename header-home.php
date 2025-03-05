<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?php
    wp_title('|', true, 'right'); // About
    bloginfo('name'); // IDM250
    ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="home-header">
    <div class="home_logo">
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
</header>