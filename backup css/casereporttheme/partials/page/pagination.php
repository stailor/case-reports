<nav class="pagination">
<?php

$big = PHP_INT_MAX;
echo paginate_links([
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $qry->max_num_pages
]);

?>
</nav>
