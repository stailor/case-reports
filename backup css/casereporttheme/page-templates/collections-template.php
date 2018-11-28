<?php
/*
 * Template Name: Page - Collections
 */

namespace com\bmj\journals\theme\jnp_base;


the_post();

get_header();

$options = get_option('highwire');

?>

<section class="main static links">
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>
  <ul>
<?php
foreach(@$options['collections'] as $slug => $checked) {
    $term = get_term_by('slug', $slug, 'collections');
    echo '<li><a href="'.site_url('/collections/'.$term->slug).'">'.$term->name.'</a></li>';
}
?>
  </ul>
</section>

<?php

get_footer();
