<?php

use com\bmj\journals\theme\jnp_base;

?>
<section class="nav-crumb">
  <div>
    <div>
      <div class="crumbs">
<?php   if (is_page() || is_archive()): ?>
        <a class="home" href="/">Home</a> <span class="slash">/</span> <span class="title"><?=jnp_base\get_the_title()?></span>
<?php   endif; ?>
      </div>
      <div class="email"><a href="/alerts"><div class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 22">
        <style>.a{fill:none;}</style>
        <rect x="0.5" y="0.5" width="32" height="21" class="a"></rect>
        <polyline points="0.6 0.7 16.6 13.4 32.4 0.9 " class="a"></polyline>
        <line x1="0.8" y1="21.3" x2="11.6" y2="9.8" class="a"></line>
        <line x1="32.4" y1="21.5" x2="21.5" y2="9.7" style="fill:none;stroke-linejoin:round;"></line>
    </svg></div>Email alerts</a></div>
    </div>
  </div>
</section>
