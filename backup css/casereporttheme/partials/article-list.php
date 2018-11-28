<?php

global $post;

while($qry->have_posts()) {
    $qry->the_post();

    if (is_array($authors = get_post_meta($post->ID, 'authors', true))) {
        $authors = join(', ', $authors);
    }
    $doi = get_post_meta($post->ID, 'doi', true);

    include(locate_template('partials/article.php'));
}

include(locate_template('partials/page/pagination.php'));
