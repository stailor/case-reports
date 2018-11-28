<?php

use com\bmj\journals\theme\jnp_base;

global $post, $wp_query;


get_header();

?>
<section class="main static articles">
  <h1><?=jnp_base\get_the_title()?></h1>
  <p><?=jnp_base\get_the_content()?></p>
<?php

    $qry = $wp_query;
    include(locate_template('partials/article-list.php'));

?>
</section>

<?php

get_footer();
