<?php
$classes = ['cookie','closed'];
if (@$_COOKIE['cookiebar'] == 'hide') {
    $classes[] = 'hide';
}
?>
        <section class="<?=join(' ',$classes)?>">
          <div id="close-cookie"><img src="<?=$GLOBALS['bmj']['repository']?>/icon-close.png"
                                      srcset="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4IDQ4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA0OCA0OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PGc+PHJlY3QgeD0iNS4zMjIiIHk9IjIzIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjcwNzEgMC43MDcxIC0wLjcwNzEgMC43MDcxIDI0IC05Ljk0MTEpIiBmaWxsPSIjZmZmIiB3aWR0aD0iMzcuMzU1IiBoZWlnaHQ9IjIiLz48L2c+PGc+PHJlY3QgeD0iMjMiIHk9IjUuMzIyIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjcwNzEgMC43MDcxIC0wLjcwNzEgMC43MDcxIDI0IC05Ljk0MTEpIiBmaWxsPSIjZmZmIiB3aWR0aD0iMiIgaGVpZ2h0PSIzNy4zNTUiLz48L2c+PC9nPjwvc3ZnPgo="></div>

          <p>This site uses cookies. <span id="cookie-more">More info <img src="<?=$GLOBALS['bmj']['repository']?>/icon-arrow-down.png"
                                                                           srcset="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0OCA0OCI+PHBvbHlnb24gcG9pbnRzPSI5IDMzLjQgNy42IDMyLjEgMjQuNCAxNC42IDQwLjQgMzIuMSAzOC45IDMzLjQgMjQuNCAxNy41ICIgZmlsbD0iI2ZmZiIvPjwvc3ZnPgo="></span><span class="info">By continuing to browse the site you are agreeing to our use of cookies. <a href="http://company.bmj.com/privacy-policy/#cookies">Find out more here.</a></span></p>
        </section>
