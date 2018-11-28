<section class="platform">
  <div class="logo">
    <a href="http://www.bmj.com/company"><img src="<?=$GLOBALS['bmj']['repository']?>/logo-bmj-footer.png"
                                              srcset="<?=$GLOBALS['bmj']['repository']?>/logo-bmj-footer.svg"></a>
  </div><div class="menu">
<?php
    include(locate_template('partials/footer/platform/menu.php'));
?>
  </div><div class="content">
<?php
    include(locate_template('partials/footer/platform/issn.php'));
    include(locate_template('partials/footer/platform/copyright.php'));
?>
    <p>京ICP备15042040号-3</p>
  </div>
</section>
