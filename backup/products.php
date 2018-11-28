<?php
/** 
 * JNP BMJ Products widget 
 *  
 * @package jnp-widgets 
 */

namespace com\bmj\jnp\plugins\jnp_widgets\misc;
use com\bmj\jnp\plugins\jnp_widgets\JNP_Widget;


/**
 * JNP Current Issue Widget class
 */
class BMJProducts_Widget extends JNP_Widget
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->defaults = [
            'title'         => 'BMJ Products',
            'blurb'         => ''
        ];
        parent::__construct('misc-bmjproducts', 'Misc: BMJ Products Widget');
    }

    /**
     * @inheritdoc
     */
    public function widget($args, $instance)
    {
        $this->openWidget($instance);
        
        $productTitle = get_option('bmj_option_title');
        $productContent = get_option('bmj_option_editor');
        $productVideo = get_option('bmj_option_video');
        $productButtontext = get_option('bmj_option_buttontext');
        $productButtonurl = get_option('bmj_option_buttonurl');  
        ?><div>
        <div class="widget-products">
                        <header>
                            <div>        
                        <div class="icon">
                                <!--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="-285 408.9 24 24" style="enable-background:new -285 408.9 24 24;" xml:space="preserve">
                                <g id="Layer_2">
                                <path style="stroke:none;fill:#fff" class="st2" d="M-265.8,423.6c-0.6-0.6-1.2-1.2-1.2-4.1c0-3-2.2-5.4-5-5.9c0.1-0.2,0.2-0.4,0.2-0.6c0-0.6-0.5-1.1-1.1-1.1
                                s-1.1,0.5-1.1,1.1c0,0.2,0.1,0.5,0.2,0.6c-2.8,0.5-5,2.9-5,5.9c0,2.9-0.6,3.5-1.2,4.1c-1.7,1.7-0.5,4.2,1.6,4.2h3.3
                                c0,1.3,1,2.3,2.3,2.3s2.3-1,2.3-2.3h3.3C-265.4,427.7-264.1,425.3-265.8,423.6z M-273,428.6c-0.5,0-0.9-0.4-0.9-0.9h1.7
                                C-272.1,428.2-272.5,428.6-273,428.6z M-267.4,426h-11.2c-0.6,0-0.9-0.7-0.5-1.1c1-1,1.8-2,1.8-5.5c0-2.3,1.9-4.2,4.2-4.2
                                s4.2,1.9,4.2,4.2c0,3.5,0.8,4.4,1.8,5.5C-266.5,425.3-266.8,426-267.4,426L-267.4,426z"/>
                                </g>
                                </svg>-->
                            <svg class="primary-color-fill" version="1.1" id="Layer_2_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="-277 400.9 40 40" style="enable-background:new -277 400.9 40 40;" xml:space="preserve">
                            <style type="text/css">
                            .st0

                            {fill:none;stroke:#FFFFFF;stroke-miterlimit:10;}
                            </style>
                            <path class="st0" d="M-253.3,435.8c0,2.1-1.7,3.8-3.8,3.8s-3.8-1.7-3.8-3.8c0-0.2,0-0.5,0.1-0.7h7.4
                            C-253.3,435.3-253.3,435.5-253.3,435.8z M-245.9,429.1l-2-12.7c-0.7-3.8-3.2-7-7-7h0v-5.6c0-0.7-0.5-1.3-1-1.3h-2.1
                            c-0.5,0-1,0.6-1,1.3v5.6c-3.6,0.2-6.3,3.3-6.5,7l-2.5,12.7c-1.4,3.7-5.9,6-2,6h26.2C-240.1,435.1-244.3,432.7-245.9,429.1z"/>
                            </svg>
                            </div>
                            
                        
                        </div>
                        </header>
                        <div>
                            <h3><?php echo $productTitle;?></h3>
                        <section>
                            <?php echo $productContent;?>
                        <?php
                            if($productVideo){
                                echo $productVideo;
                            }
                            if($productButtontext){ ?>
                        <a href="<?php echo $productButtonurl;?>"><button class="btn" style="width: 100%;"><?php echo $productButtontext;?></button></a>
                            <?php }
                        ?>
                        </section>
                        </div>
                    </div>
            </div>

            

<?php
        $this->closeWidget();
    }


}

add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\BMJProducts_Widget'); });

