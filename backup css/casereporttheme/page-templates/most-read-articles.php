<?php
/*
 * Template Name: Page - Most read articles
 */

namespace com\bmj\journals\theme\jnp_base;

function after_article($after)
{
    if (has_term('editors_choice', 'collections')) {
        $after .= '<p class="editors-choice">Editor\'s choice</p>';
    }
    return $after;
}
add_filter('after-article', __NAMESPACE__.'\after_article');


the_post();

get_header();


$qry = new \WP_Query([
    'post_type' => 'article',
    'post_status' => 'publish',
    'meta_key' => 'mfr_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'paged' => max(1, get_query_var('paged'))
]);

?>

<section class="main static articles">
  <h1><?php the_title() ?></h1>
  <?php the_content() ?>
  <?php include(locate_template('partials/article-list.php')); ?>
</section>

<?php

get_footer();
