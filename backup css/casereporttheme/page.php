<?php

the_post();

get_header();

?>
<section class="main static">
  <h1><?=get_the_title()?></h1>
  <?=do_shortcode( apply_filters('the_content', get_the_content()) )?>
</section>
<?php

get_footer();
