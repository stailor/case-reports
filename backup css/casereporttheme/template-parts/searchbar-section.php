<?php
        $aboveText = get_option('homepage_text_over_search');
        $belowText = get_option('homepage_text_below_search');
    ?>
<div class="row search-area">

            <div class="col-sm-12 search">
                <h3><?php echo $aboveText;?></h3>
                <div class="container-search">                    
                    <form role="search" method="post" action="http://casereportsbeta.bmj.com/search/" id="highwire-search-quicksearch-form-1" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" id="search" placeholder="Search the BMJ Case Reports archive"  value="" name="keywords">
                        <input type="hidden" name="form_id" value="highwire_search_quicksearch_form_1">
                        <button type="submit" class="search-btn" name="op"><img src="<?php echo get_template_directory_uri();?>/images/icon-search.svg" width="30" height="30" /></button>
                    </div>
                    
                </form>
                    <div class="advanced-search"><a href="http://casereportsbeta.bmj.com/search/">Advanced search</a></div>
                </div>
                <h4><?php echo $belowText;?></h4>
            </div>

            <div class="col-sm-12 search-browse-by">
                    <div class="container-browse">
                        <ul>
                            <li class="title">Browse case reports by:&nbsp;&nbsp;</li>
                            <?php wp_nav_menu(array('menu' => 'browse case reports', 'container' => false, 'items_wrap' => '%3$s'));?>
                        </ul>
                    </div>
            </div>

        </div>