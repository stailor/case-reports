<?php

function do_menu($location, $wrap=true)
{
    static $locations;

    if (empty($locations)) $locations = get_nav_menu_locations();
    if ($wrap) echo '<div>';

    $menu = wp_get_nav_menu_object($locations[$location]);
    wp_nav_menu([
        'container_class' => "$location footer-menu",
        'theme_location'  => $location,
        'items_wrap'      => '<h3>'.esc_html($menu->name).'</h3><ul id="%1$s" class="%2$s">%3$s</ul>'
    ]);
    if ($wrap) echo '</div>';
}

?>
<nav class="primary-color">
  <div class="wrapper">
<?php
    echo '<div>';
    do_menu('footer-menu-a',false);
    if (is_active_sidebar('footer-social-sidebar')) {
        get_sidebar('footer-social');
    }
    echo '</div>';
    do_menu('footer-menu-b');
?>
  </div><div class="wrapper">
<?php
    do_menu('footer-menu-c');
    do_menu('footer-menu-d');
?>
  </div>
  <div id="oas_Bottom"></div>
  <script type="text/javascript">oas_tag.loadAd("Bottom");</script>
</nav>
