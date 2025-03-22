<?php
$args = array(
  'post_type' => 'projects', // Replace with your post type (e.g., 'post')
  'tax_query' => array(
      array(
          'taxonomy' => 'project-categories', // Your custom taxonomy name
          'field'    => 'slug', // Can be 'slug', 'name', or 'term_id'
          'terms'    => 'Favorite', // The tag you're searching for
      ),
  ),
);

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
<h1 class="featured-project-header">Featured Project</h1>
<?php
$query->the_post();
get_template_part('components/featured-project-card');
?>

<?php else : ?>
<p>No projects found.</p>
<?php endif; ?>