<?php
$query = new WP_Query([
    'post_type' => 'Projects',
    'posts_per_page' => 3,
]);
?>
<?php if ($query->have_posts()) : ?>
<section>
  <h1 class="front-page-header">Portfolio</h1>
  <div class="grid grid-2">
        <?php
    while ($query->have_posts()) : $query->the_post();        // For each post, render this component
        get_template_part('components/project-card');
    endwhile;
        ?>
  </div>
</section>

<?php else : ?>
<p>No projects found.</p>
<?php endif; ?>