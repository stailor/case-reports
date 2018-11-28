<?php
    function customize_register(\WP_Customize_Manager $wp_customize)
    {
        $jnp_widgets = [];
        foreach(JNP_Widgets::getList() as $widget) {
            $jnp_widgets[get_class($widget)] = $widget->name;
        }
        asort($jnp_widgets);

        $wp_customize->add_section('boxen', ['title' => 'Boxes']);

        for ($i = 1; $i <= 3; $i++) {
            $wp_customize->add_setting("box_$i");
            $wp_customize->add_control("box_$i", [
                                       'label'      => "Box $i",
                                       'section'    => 'boxen',
                                       'settings'   => "box_$i",
                                       'choices'    => $jnp_widgets,
                                       'type'       => 'select'
                                       ]);
        }
    }

    function do_widget(int $n, bool $canCollapse = false)
    {
        $box = get_theme_mod("box_$n", DUMMY_WIDGET);
        the_widget($box ? $box : DUMMY_WIDGET, ['box' => $n, 'collapse' => $canCollapse] );
    }
?>
<?php get_header();?>
<!-- BROWSE CASE REPORT LINKS -->
        <?php get_template_part('template-parts/searchbar','section');?>
        <!-- STRAPLINE -->
        <!-- <div class="row container-strapline center-block page-header"> -->
        <div class="row ">        </div>



        <!-- WIDGET SECTION -->
        <div class="widgets">

            <div class="row container-publish-spotlight">

                <!-- WIDGET: PUBLISH BUTTONS -->
                 <?php get_template_part('template-parts/publishinbmj','section');?>
                <!-- WIDGET: SPOTLIGHT -->
                <?php get_template_part('template-parts/spotlight','section');?>
            </div>
            <div class="row container-specialty-altmetrics">

                <!-- WIDGET: SPECIALTY -->
                <?php get_template_part('template-parts/casereports','speciality');?>
                <!-- WIDGET: ALTMETRICS -->
                <div class="col-lg-6 col-md-6 col-sm-12 row-column-cell"> 
                    <div>
                    <div class="widget-altmetrics"> 
                        <header>

                        <div class="icon">
                                <div style="background-image: url(https://adc.bmj.com/pages/wp-content/plugins/jnp-skins/default/plugins/jnp/widgets/misc/altmetrics.png)"><svg class="primary-color-fill" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                                <g>
                                    <g id="XMLID_9_">
                                        <path d="M12.124,20.68c-2.159,0-3.915-1.756-3.915-3.916c0-2.158,1.756-3.915,3.915-3.915c2.159,0,3.916,1.756,3.916,3.915 C16.039,18.923,14.283,20.68,12.124,20.68z M12.124,14.38c-1.315,0-2.385,1.069-2.385,2.384c0,1.315,1.07,2.385,2.385,2.385 c1.315,0,2.385-1.07,2.385-2.385C14.509,15.449,13.439,14.38,12.124,14.38z"></path>
                                    </g>
                                    <g id="XMLID_8_">
                                        <path d="M29.226,14.284c-2.159,0-3.915-1.756-3.915-3.915s1.756-3.915,3.915-3.915c2.158,0,3.914,1.756,3.914,3.915 S31.384,14.284,29.226,14.284z M29.226,7.985c-1.315,0-2.386,1.069-2.386,2.384s1.07,2.384,2.386,2.384 c1.314,0,2.385-1.069,2.385-2.384S30.54,7.985,29.226,7.985z"></path>
                                    </g>
                                    <g id="XMLID_7_">
                                        <path d="M22.175,30.118c-2.159,0-3.916-1.757-3.916-3.916c0-2.158,1.757-3.915,3.916-3.915c2.158,0,3.914,1.756,3.914,3.915 C26.089,28.361,24.333,30.118,22.175,30.118z M22.175,23.818c-1.315,0-2.386,1.07-2.386,2.384c0,1.315,1.07,2.387,2.386,2.387 c1.315,0,2.385-1.071,2.385-2.387C24.56,24.888,23.49,23.818,22.175,23.818z"></path>
                                    </g>
                                    <g id="XMLID_6_">
                                        <path d="M7.399,23.296c-0.157,0-0.315-0.048-0.452-0.148c-0.34-0.25-0.414-0.729-0.164-1.069l2.475-3.375 c0.25-0.34,0.728-0.415,1.069-0.164c0.34,0.25,0.414,0.729,0.164,1.069l-2.475,3.375C7.867,23.188,7.635,23.296,7.399,23.296z"></path>
                                    </g>
                                    <g id="XMLID_5_">
                                        <path d="M20.225,24.421c-0.179,0-0.36-0.063-0.505-0.191l-5.175-4.556c-0.317-0.279-0.348-0.763-0.069-1.08 c0.278-0.318,0.762-0.35,1.08-0.069l5.175,4.556c0.317,0.279,0.348,0.763,0.069,1.08C20.648,24.333,20.437,24.421,20.225,24.421z"></path>
                                    </g>
                                    <g id="XMLID_4_">
                                        <rect x="20.258" y="17.547" transform="matrix(0.4035 -0.915 0.915 0.4035 -1.5546 34.2402)" width="10.452" height="1.53"></rect>
                                    </g>
                                    <g id="XMLID_3_">
                                        <path d="M36.537,18.065c-0.183,0-0.366-0.065-0.512-0.197l-4.495-4.05c-0.314-0.283-0.34-0.767-0.057-1.081 c0.284-0.314,0.769-0.339,1.08-0.056l4.495,4.05c0.314,0.283,0.34,0.767,0.057,1.081C36.954,17.979,36.746,18.065,36.537,18.065z"></path>
                                    </g>
                                    <g id="XMLID_1_">
                                        <path d="M38,38H2c-0.497,0-0.9-0.403-0.9-0.9V2.9C1.1,2.403,1.503,2,2,2s0.9,0.403,0.9,0.9v33.299H38c0.497,0,0.9,0.403,0.9,0.9 S38.497,38,38,38z"></path>
                                    </g>
                                    <g id="XMLID_2_">
                                        <path d="M38,38c-0.497,0-0.9-0.403-0.9-0.9v-1.8c0-0.497,0.403-0.9,0.9-0.9s0.9,0.403,0.9,0.9v1.8C38.9,37.597,38.497,38,38,38z"></path>
                                    </g>
                                    <g id="XMLID_10_">
                                        <path d="M26.3,38c-0.497,0-0.9-0.403-0.9-0.9v-1.8c0-0.497,0.403-0.9,0.9-0.9s0.9,0.403,0.9,0.9v1.8 C27.2,37.597,26.797,38,26.3,38z"></path>
                                    </g>
                                    <g id="XMLID_11_">
                                        <path d="M13.7,38c-0.497,0-0.9-0.403-0.9-0.9v-1.8c0-0.497,0.403-0.9,0.9-0.9s0.9,0.403,0.9,0.9v1.8 C14.6,37.597,14.197,38,13.7,38z"></path>
                                    </g>
                                    <g id="XMLID_16_">
                                        <path d="M3.8,3.8H2c-0.497,0-0.9-0.403-0.9-0.9S1.503,2,2,2h1.8c0.497,0,0.9,0.403,0.9,0.9S4.297,3.8,3.8,3.8z"></path>
                                    </g>
                                    <g id="XMLID_15_">
                                        <path d="M3.8,15.5H2c-0.497,0-0.9-0.403-0.9-0.9s0.403-0.9,0.9-0.9h1.8c0.497,0,0.9,0.403,0.9,0.9S4.297,15.5,3.8,15.5z"></path>
                                    </g>
                                    <g id="XMLID_14_">
                                        <path d="M3.8,27.2H2c-0.497,0-0.9-0.403-0.9-0.9s0.403-0.9,0.9-0.9h1.8c0.497,0,0.9,0.403,0.9,0.9S4.297,27.2,3.8,27.2z"></path>
                                    </g>
                                </g>
                                </svg>                                
                                </div></div>
                            <h2>Altmetrics</h2>
                        
                        </header>
                        
                        <section>

                    <div class="row">
                        <div class="col-12">
                         <?php get_template_part('template-parts/altmetrics','section');?>   
                        </div>
                    </div>
                        </section>         
                    </div>
                </div>
                </div>
            </div>

            <div class="row container-products-most-read">
                
                <!-- WIDGET: BMJ PRODUCTS -->
                <?php get_template_part('template-parts/bmjproducts','section');?>   
                <!-- WIDGET: MOST READ -->
                <?php get_template_part('template-parts/mostread','section');?>   

            </div>
            
            
            <!--JNP Widgets Start-->
            
            
            <?php
                $box1 = get_theme_mod('box_1');
                $box2 = get_theme_mod('box_2');
                $box3 = get_theme_mod('box_3');
                $box4 = get_theme_mod('box_4');
            ?>
            <?php if( $box1 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget' AND $box2 != 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget'){?>
            <div class="row">                
                <div class="col-lg-12 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(2);?>
                    <div class="expandable">
                                <div class="expand" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                    </div>
                </div>
            </div>
            <?php } elseif( $box2 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget' AND $box1 != 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget'){?>
            <div class="row">               
                <div class="col-lg-12 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(1);?>
                    <div class="expandable">
                                <div class="expand" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                            </div>
                </div>
            </div>
            <?php } elseif( $box1 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget' AND $box2 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget'){?>
            
            <?php } else { ?>
            <div class="row">                
                <div class="col-lg-6 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(1);?>
                    <div class="expandable">
                                <div class="expand" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                            </div>
                </div>                
                <div class="col-lg-6 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(2);?>
                    <div class="expandable">
                                <div class="expand four" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                            </div>
                </div>
            </div>
            <?php } ?>
            
            
            <?php if( $box3 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget' AND $box4 != 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget'){?>
            <div class="row">                
                <div class="col-lg-12 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(4);?>
                    <div class="expandable">
                                <div class="expand one" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                            </div>
                </div>
            </div>
            <?php } elseif( $box4 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget' AND $box3 != 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget'){?>
            <div class="row">               
                <div class="col-lg-12 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(3);?>
                    <div class="expandable">
                                <div class="expand" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                            </div>
                </div>
            </div>
            <?php } elseif( $box3 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget' AND $box4 == 'com\bmj\jnp\plugins\jnp_widgets\misc\Empty_Widget'){?>
            
            <?php } else { ?>
            <div class="row">                
                <div class="col-lg-6 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(3);?>
                    <div class="expandable">
                                <div class="expand" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                            </div>
                </div>                
                <div class="col-lg-6 col-md-6 col-lg-12 row-column-cell">
                    <?php do_widget(4);?>
                    <div class="expandable">
                                <div class="expand" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><polygon points="40,19 21,19 21,0 19,0 19,19 0,19 0,21 19,21 19,40 21,40 21,21 40,21"></polygon></svg></div>
                                 <div class="collapse" style="display: none;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;"><g><rect y="19" width="40" height="2"></rect></g></svg></div>
                            </div>
                </div>
            </div>
            <?php } ?>
            
            
            <!--JNP Widgets End-->
            
        </div>
        
        <script>
        jQuery(document).ready(function(){
            jQuery('.articles-editors_choice').addClass('expandable-widget');
            jQuery('.articles-latest').addClass('expandable-widget');
            jQuery('.articles-popular').addClass('expandable-widget');
            jQuery('.articles-recent').addClass('expandable-widget');
            jQuery('.careers-featured_jobs').addClass('expandable-widget');
            jQuery('.careers-featured_recruiters').addClass('expandable-widget');
            jQuery('.careers-jobs').addClass('expandable-widget');
            jQuery('.misc-carousel').addClass('expandable-widget');
                jQuery('.media-video').addClass('none-expandable');
                jQuery('.media-video').parent("div").next("div").hide();
            jQuery('.misc-about').addClass('expandable-widget');
            jQuery('.misc-altmetrics').addClass('expandable-widget');
            jQuery('.misc-authors').addClass('expandable-widget');
            jQuery('.misc-blog').addClass('expandable-widget');
            jQuery('.misc-current_issue').addClass('expandable-widget');
            jQuery('.widget-dummy').addClass('expandable-widget');
            jQuery('.intro_widget').addClass('expandable-widget');
            jQuery('.misc-related_journals').addClass('expandable-widget');
            
        });
        </script>
        
        <script>
        jQuery(document).ready(function(){
            if (jQuery(window).width() < 768) {
                        jQuery(".expandable-widget").find('div:nth-child(3)').hide();
                        jQuery(".view-all").hide();
                        jQuery(".expandable-widget").click(function(){                        
                        jQuery(this).closest(".expandable-widget").find('div:nth-child(2)').toggle();
                        jQuery(this).closest(".expandable-widget").find('div:nth-child(3)').toggle();
                        jQuery("header div .view-all").hide();
                        jQuery(this).parent("div").next("div").find(".collapse").toggle();
                        jQuery(this).parent("div").next("div").find(".expand").toggle();
                        
                        
                        });
                        
                        jQuery(".expandable").click(function(){                       
                        jQuery(this).prev("div").find(".expandable-widget div:nth-child(2)").toggle();
                        jQuery(this).prev("div").find(".expandable-widget div:nth-child(3)").toggle();
                        jQuery("header div .view-all").hide();
                        jQuery(this).find('.collapse').toggle();
                        jQuery(this).find('.expand').toggle();                
                        });                
             }             
        });
        </script>
       
<?php get_footer();?>