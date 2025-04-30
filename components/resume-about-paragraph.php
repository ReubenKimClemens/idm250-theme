<?php
$front_page_id = get_option('page_on_front'); // Gets the ID of the static front page
$menu_paragraph = get_post_meta($front_page_id, 'about_paragraph', true);
$about_name = get_post_meta($front_page_id, 'name', true);
$position = get_post_meta($front_page_id, 'position', true);
?>

<?php if ($menu_paragraph): ?>
    <div class='resume-about-section'>
        <?php if ($about_name): ?>
            <h2><?php echo $about_name; ?></h2>
        <?php endif; ?>
        <?php if ($position): ?>
            <h3><?php echo $position; ?></h3>
        <?php endif; ?>
        <p class="menu-paragraph"><?php echo $menu_paragraph; ?></p>
    </div>
    <div class="links">
        <p>Website: <a href="reubenkimclemens.com">reubenkimclemens.com</a></p>
    </div>
<?php endif; ?>