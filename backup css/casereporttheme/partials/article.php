<article class="order-<?=$post->menu_order?>">
  <h1><a href="/cgi/doi/<?=$doi?>"><?=get_the_title()?></a></h1>
  <p class="authors"><?=$authors?></p>
  <p class="doi"><?=$doi?></p>
  <p class="date"><?=get_the_date()?></p>
  <?=apply_filters('after-article', '')?>
</article>
