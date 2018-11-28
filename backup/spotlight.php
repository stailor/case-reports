<?php
/** 
 * JNP Spotlight widget 
 *  
 * @package jnp-widgets 
 */

namespace com\bmj\jnp\plugins\jnp_widgets\misc;
use com\bmj\jnp\plugins\jnp_widgets\JNP_Widget;


/**
 * JNP Current Issue Widget class
 */
class Spotlight_Widget extends JNP_Widget
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->defaults = [
            'title'         => 'Spotlight',
            'blurb'         => ''
        ];
        parent::__construct('misc-spotlight', 'Misc: Spotlight Widget');
    }

    /**
     * @inheritdoc
     */
    public function widget($args, $instance)
    {
       $this->openWidget($instance);
?>
                    <div class="widget-spotlight expandable-widget">
                        <header>
                        <div class="icon">
                            <!--<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="-288 411.9 18 18" style="enable-background:new -288 411.9 18 18;" xml:space="preserve">
                                <style type="text/css">
                                .st0{fill:#FFFFFF;}
                                .st1{fill:none;}
                                </style>
                                <path class="st0" d="M-279,423.2l3.7,2.7l-1.4-4.4l3.7-2.6h-4.5l-1.5-4.5l-1.5,4.5h-4.5l3.7,2.6l-1.4,4.4L-279,423.2z"/>
                                <path class="st1" d="M-288,411.9h18v18h-18V411.9z"/>
                            </svg>-->
                            <svg class="primary-color-fill" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="-277 400.9 40 40" style="enable-background:new -277 400.9 40 40;" xml:space="preserve">
                            <style type="text/css">
                            .st0

                            {fill:#FFFFFF;}
                            </style>
                            <g>
                            <path class="st0" d="M-245.1,439.7l-12.1-6.6l-12.4,6.2l2.6-13.6l-9.8-9.8l13.7-1.8l6.3-12.3l5.9,12.5l13.7,2.2l-10.1,9.5
                            L-245.1,439.7z M-257.2,431.7l10.5,5.8l-1.8-11.9l8.7-8.2l-11.8-1.9l-5.2-10.9l-5.5,10.7l-11.9,1.5l8.5,8.5l-2.3,11.8L-257.2,431.7
                            z"/>
                            </g>
                            </svg>
                        </div>
                        <?php $spotlightTitle = get_option('homepage_spotlight_title');?>
                        <h2><?php echo $spotlightTitle;?></h2>
                        
                        </header>
                        <section>
                        <?php
                            $displayText = get_option('new_option_checkbox');
                            if($displayText === 'on'){
                                echo get_option('new_option_editor');
                            } else {
                                
                        ?>
                            <?php
                                $spotargs = array(
                                    'post_type' => 'article',
                                    'posts_per_page' => 10,
                                    //'orderby' => 'menu_order',
                                    'order'     => 'DESC',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'display-check',
                                                        'value' => 'yesdisplay',
                                                        'compare' => '=',
                                                    )
                                                )
                                );
                                $spotlightCount = 0;    
                                $spotposts = get_posts($spotargs);

                                foreach($spotposts as $spotpost){
                                    $display = get_post_meta($spotpost->ID, 'display-check', TRUE);
                                    $toc = wp_get_post_terms($spotpost->ID,'toc');                                       
                                        $toc = array_shift($toc);
                                        $termName = $toc->name;
                                        if(empty($termName)){
                                            $termName = 'BMJ Case Reports';
                                        }
                                    if($display == 'yesdisplay'){
                                        
                                        $title = $spotpost->post_title;
                                        $date = get_the_date('d F,Y', $spotpost->ID);
                                        $displayVideo = get_post_meta($spotpost->ID,'video-check', TRUE);
                                        $displayimage = get_post_meta($spotpost->ID,'image-check', TRUE);
                                        $articleLink = get_post_meta($spotpost->ID,'doi', TRUE);
                                        
                                        if($displayVideo == 'yesvideo'){
                                            $videoCode = get_post_meta($spotpost->ID,'post-videoCode',TRUE);
                                            ?>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12">    
                                                    <article>
                                                    <header><h5><?php echo $termName;?></h5></header>
                                                    <h4><a href="/cgi/doi/<?php echo $articleLink;?>"><?php echo $title;?></a></h4>
                                                    <footer><?php echo $date;?></footer>
                                                    </article>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div style="position: relative; display: block; max-width: 100%;">
                                                        <div style="padding-top: 56.25%;">
                                                            <?php echo $videoCode;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                            <?php
                                        }
                                        elseif ($displayimage == 'yesimage') {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12">
                                                    <article>
                                                    <header><h5><?php echo $termName;?></h5></header>
                                                    <h4><a href="/cgi/doi/<?php echo $articleLink;?>"><?php echo $title;?></a></h4>
                                                    <footer><?php echo $date;?></footer>
                                                    </article>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <img src="<?php echo get_post_meta($spotpost->ID,'post-imagepath',TRUE);?>" alt="case report image" width="100%"/>
                                                </div>
                                            </div>    
                                            <?php
                                        }
                                        elseif($displayVideo == 'yesvideo' AND $displayimage == 'yesimage'){
                                            ?>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12">    
                                                    <article>
                                                    <header><h5><?php echo $termName;?></h5></header>
                                                    <h4><a href="/cgi/doi/<?php echo $articleLink;?>"><?php echo $title;?></a></h4>
                                                    <footer><?php echo $date;?></footer>
                                                    </article>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div style="position: relative; display: block; max-width: 100%;">
                                                        <div style="padding-top: 56.25%;">
                                                            <?php echo $videoCode;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                            <?php
                                        }
                                        elseif($displayVideo != 'yesvideo' AND $displayimage != 'yesimage'){
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <article>
                                                        <header><h5><?php echo $termName;?></h5></header>
                                                        <h4><a href="/cgi/doi/<?php echo $articleLink;?>"><?php echo $title;?></a></h4>
                                                        <footer><?php echo $date;?></footer>
                                                    </article>
                                                </div>
                                            </div>    
                                            <?php
                                        }
                                        $spotlightCount++;
                                    }                                    
                                    if($spotlightCount == 3){
                                        break;
                                    }
                                }
                                $spotlightCount;
                                if($spotlightCount <= 3){
                                    $newCount = 3 - $spotlightCount;
                                }
                                if($newCount <=3 AND $newCount != 0){
                                    //echo 'TEST';
                                $newArgs = array(
                                    'post_type' => 'article',
                                    'posts_per_page' => $newCount,
                                    'order' => 'DESC'
                                );
                                $newPosts = get_posts($newArgs);
                                //print_r($newPosts);
                                $artCount = 0;
                                foreach($newPosts as $newPost){
                                    $newdisplay = get_post_meta($newPost->ID, 'display-check', TRUE);
                                    $newtoc = wp_get_post_terms($newPost->ID,'toc');                                       
                                        $newtoc = array_shift($newtoc);
                                        $newtermName = $newtoc->name;
                                        if(empty($newtermName)){
                                            $newtermName = 'BMJ Case Reports';
                                        }
                                    $newarticleLink = get_post_meta($newPost->ID,'doi', TRUE);
                                    if($newdisplay != 'yesdisplay'){
                                    ?>
                                     <div class="row">
                                                <div class="col-md-12">
                                                    <article>
                                                        <header><h5><?php echo $newtermName;?></h5></header>
                                                        <h4><a href="/cgi/doi/<?php echo $newarticleLink;?>"><?php echo $newPost->post_title;?></a></h4>
                                                        <footer><?php echo get_the_date('d F,Y', $newPost->ID);?></footer>
                                                    </article>
                                                </div>
                                            </div>   
                                    <?php $artCount++;                                     
                                    }
                                        if($artCount == $newCount){
                                                break;
                                            }
                                        } 
                                
                                    }
                                ?>
                            <?php } ?>
                        </section>
                    </div>

               
<?php
        $this->closeWidget();
    }


}

add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Spotlight_Widget'); });

