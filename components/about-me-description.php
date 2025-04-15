
<?php
$front_page_id = get_option('page_on_front'); // Gets the ID of the static front page
$menu_paragraph = get_post_meta($front_page_id, 'about_paragraph', true);
$about_name = get_post_meta($front_page_id, 'name', true);
$position = get_post_meta($front_page_id, 'position', true);

if ($menu_paragraph) {
    echo "<div class='about-paragraph-section'>";
        if ($about_name) {
            echo "<h1>Hi! I'm " . $about_name . "</h1>";
        }
        if ($position) {
            echo "<h2>". $position ."</h2>";
        }
        echo '<p class="menu-paragraph">' . $menu_paragraph . '</p>';
    echo "</div>";
}
?>