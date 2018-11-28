<?php

$journals_logo = apply_filters('jnp_journals_logo', ['img'=>$GLOBALS['bmj']['repository'].'/logo-bmj-journals', 'url'=>'//journals.bmj.com/']);

?>
<section class="nav-journals">
  <a href="<?=$journals_logo['url']?>"><img src="<?=$journals_logo['img']?>.png"
                                            srcset="<?=$journals_logo['img']?>.svg"></a>
<?php
$items_wrap = '<ul id="%1$s" class="desktop %2$s">%3$s<li class="menu-item search-form">'.get_search_form(false).'</li><li class="menu-item search closed"><a href="#">Search ';
$items_wrap .='<div class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><style>fill: #333; stroke: #333;</style><path d="M17.9 36.2C9.1 36.2 2 29.1 2 20.3S9.1 4.5 17.9 4.5s15.9 7.1 15.9 15.8S26.6 36.2 17.9 36.2zM17.9 6.5C10.2 6.5 4 12.7 4 20.3c0 7.6 6.2 13.8 13.9 13.8 7.7 0 13.9-6.2 13.9-13.8C31.8 12.7 25.5 6.5 17.9 6.5z"></path><polygon points="29.3 30.1 31.9 29.6 46 40.4 44.8 41.9 "></polygon><polygon points="29.3 30.1 29.5 32.7 43.6 43.5 44.8 41.9 "></polygon></svg></div>';
$items_wrap .= '</a></li></ul>';
$menu = wp_nav_menu([
    'theme_location' => 'journals-menu',
    'items_wrap'     => $items_wrap,
    'echo'           => false
]);
if (empty($menu)) {
    printf('<div class="menu-journals-menu-container">'.$items_wrap.'</div>', 'menu-journals-menu', 'menu', '');
} else {
    echo $menu;
}

?>
</section>
