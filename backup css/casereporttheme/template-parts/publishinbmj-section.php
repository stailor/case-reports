<?php
        $publishTitle = get_option('bmj_publish_title');
        $publishOnetext = get_option('bmj_publish_boxonetext');
        $publishOneurl = get_option('bmj_publish_boxoneurl');
        $publishTwotext = get_option('bmj_publish_boxtwotext');
        $publishTwourl = get_option('bmj_publish_boxtwourl');
        $publishThreetext = get_option('bmj_publish_boxthreetext');
        $publishThreeurl = get_option('bmj_publish_boxthreeurl');
    ?>
<div class="col-md-4 col-sm-12 row-column-cell">
    <div>
                 <div class="widget-publish">
                        <header>
                            <div class="icon">
                                <div style="background-image: url(https://adc.bmj.com/pages/wp-content/plugins/jnp-skins/default/plugins/jnp/widgets/misc/authors.png)">
                                    <svg class="primary-color-fill" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;">
                                    <path d="M1.8,36.9l1.2,1.2l-1.2,1.2c-0.3,0.3-0.8,0.3-1.2,0c-0.3-0.3-0.3-0.8,0-1.2L1.8,36.9z M28.8,1.3 c-0.5-0.6-2-0.5-3,0.5l-10,10c-1,1-1.1,2.3-0.4,2.9L28.8,1.3z M19.1,24.8l-5.4,5.5c-2.5,2-5.4,4.1-8.9,4.8c0.8-3.2,2.7-6.1,5.1-8.7 l5.4-5.4l-1.2-1.2l-5.5,5.5C5.6,28.3,4.1,31.8,3,35.8l1.1,1c4.1-1.1,7.6-2.4,10.7-5.4l5.5-5.5L19.1,24.8z M30.9,2.2 c2.1-2.1,5.2-2.4,7.4-0.3c2.1,2.1,1.6,5-0.5,7.1L22.6,24.3l-6.9-6.9L30.9,2.2z M37.1,3.2c-1.6-1.6-4-0.7-4.9,0.2l-14.1,14l4.5,4.5 L36.7,7.8C37.7,6.9,38.6,4.7,37.1,3.2z"></path></svg>
                                </div>
                            </div>
                            <h2><?php echo $publishTitle;?></h2>
                            
                        </header>
                        <section>
                            <a href="<?php echo $publishOneurl;?>"><button class="btn"><?php echo $publishOnetext;?></button></a>
                            <a href="<?php echo $publishTwourl;?>"><button class="btn"><?php echo $publishTwotext;?></button></a>
                            <a href="<?php echo $publishThreeurl;?>"><button class="btn"><?php echo $publishThreetext;?></button></a>
                        </section>
                 </div>
</div>
</div>