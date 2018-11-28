<?php

namespace com\bmj\journals\theme\jnp_base;

function reverse_menu($menu)
{
    return array_reverse($menu);
}

?>
<section class="nav-mobile" id="nav-mobile">
  <div class="primary-color"
       id="close-burger"><div><img src="<?=$GLOBALS['bmj']['repository']?>/icon-close.png"
                                   srcset="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4IDQ4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA0OCA0OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PGc+PHJlY3QgeD0iNS4zMjIiIHk9IjIzIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjcwNzEgMC43MDcxIC0wLjcwNzEgMC43MDcxIDI0IC05Ljk0MTEpIiBmaWxsPSIjZmZmIiB3aWR0aD0iMzcuMzU1IiBoZWlnaHQ9IjIiLz48L2c+PGc+PHJlY3QgeD0iMjMiIHk9IjUuMzIyIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjcwNzEgMC43MDcxIC0wLjcwNzEgMC43MDcxIDI0IC05Ljk0MTEpIiBmaWxsPSIjZmZmIiB3aWR0aD0iMiIgaGVpZ2h0PSIzNy4zNTUiLz48L2c+PC9nPjwvc3ZnPgo="></div></div>
<?php
    

    wp_nav_menu([
        'container_class' => "journal-menu header-menu",
        'menu_class'      => 'menu primary-color',
        'theme_location'  => 'journal-menu'
    ]);
    add_filter(‘wp_nav_menu_objects’, __NAMESPACE__.'\reverse_menu');
    wp_nav_menu([
        'container_class' => "journals-menu header-menu",
        'menu_class'      => 'menu',
        'theme_location'  => 'journals-menu'
    ]);
    remove_filter(‘wp_nav_menu_objects’, __NAMESPACE__.'\reverse_menu');

    $journals_logo = apply_filters('jnp_journals_logo', ['img'=>$GLOBALS['bmj']['repository'].'/logo-bmj-journals', 'url'=>'//journals.bmj.com/']);
?>
  <p class="bmj-journals"><a href="<?=$journals_logo['url']?>"><img src="<?=$journals_logo['img']?>.png"
                                                                    srcset="<?=$journals_logo['img']?>.svg"></a></p>
<?php
    do_action('after_nav-mobile');
?>
</section>
