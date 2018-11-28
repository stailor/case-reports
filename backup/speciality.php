<?php
/** 
 * JNP Specialty widget 
 *  
 * @package jnp-widgets 
 */

namespace com\bmj\jnp\plugins\jnp_widgets\misc;
use com\bmj\jnp\plugins\jnp_widgets\JNP_Widget;


/**
 * JNP Current Issue Widget class
 */
class Specialty_Widget extends JNP_Widget
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->defaults = [
            'title'         => 'Specialty',
            'blurb'         => ''
        ];
        parent::__construct('misc-specialty', 'Misc: Specialty Widget');
    }

    /**
     * @inheritdoc
     */
    public function widget($args, $instance)
    {
       $this->openWidget($instance);
?>
<div class="widget-specialty expandable-widget">
                        <header>
                            <div class="icon">
                                <!--<span class="icon-bp-icons-specialties"></span>-->
                                <svg class="primary-color-fill" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="-277 400.9 40 40" style="enable-background:new -277 400.9 40 40;" xml:space="preserve">
                                <style type="text/css">
                                .st0

                                {fill:#FFFFFF;}
                                </style>
                                <g id="specialties">
                                <g>
                                <polygon class="st0" points="-251.5,410.7 -251.5,404.5 -262.6,404.5 -262.6,410.7 -264.2,410.7 -264.2,404.6 -262.5,402.9 
                                -251.4,402.9 -249.8,404.7 -249.8,410.7 "/>
                                </g>
                                <g>
                                <path class="st0" d="M-242.4,438.9h-29.2c-2.7,0-5-2.3-4.9-5l1.6-18.6c0.1-2.5,2.2-4.7,4.9-4.7h26c2.7,0,5,2.1,4.9,4.8l1.6,18.5
                                C-237.5,436.7-239.7,438.9-242.4,438.9z M-270,412.2c-1.9,0-3.1,1.7-3.2,3.3l-1.7,18.9c0,2.2,2.3,2.9,3.2,2.9h29.4
                                c0.9,0,3.3-0.7,3.3-2.9l-1.6-19c-0.2-2.2-1.2-3.3-3.4-3.3L-270,412.2z"/>
                                </g>
                                <g>
                                <rect x="-257.9" y="417" class="st0" width="1.7" height="14.7"/>
                                </g>
                                <g>
                                <rect x="-264.3" y="423.6" class="st0" width="14.7" height="1.6"/>
                                </g>
                                </g>
                                </svg>
                            </div>
                        </header>
                        
                        <section>

                        <div class="row">
                            <div class="col-sm-12 specialty-list-container">
                                <ul class="specialty-list">
                                    <?php
                                        $specialityTerms = get_terms([
                                            'taxonomy' => 'collections',
                                            'hide_empty' => false,
                                        ]);
                                        $newArray = array();
                                        //print_r($specialityTerms);
                                        foreach($specialityTerms as $splTerm){
                                            //$termMeta = get_term_meta($splTerm->term_id);
                                            //print_r($termMeta);
                                            $t_id = $splTerm->term_id;
                                            $term_meta = get_option( "taxonomy_$t_id" );
                                            $termValue = esc_attr( $term_meta['custom_term_meta'] ) ? esc_attr( $term_meta['custom_term_meta'] ) : '';
                                            $termOrder = esc_attr( $term_meta['custom_term_meta_order'] ) ? esc_attr( $term_meta['custom_term_meta_order'] ) : '';
                                            if($termOrder != ''){
                                            $newArray[$termOrder] = (object)array(
                                                'title' => $splTerm->name,
                                                'idnum' => $splTerm->term_id,
                                                'color' => $termValue
                                            );
                                            }
                                     } 
                                     
                                     ksort( $newArray, SORT_NUMERIC );
                                     $countSpecialty = 0;
                                     foreach ($newArray as $newterm){                                          
                                                    
                                            if($newterm->color != ''){
                                                if(ctype_xdigit($newterm->color)){
                                                ?><li><div style="border-left:5px solid #<?php echo $newterm->color;?>; padding-left: 8px;"><a href='<?php echo get_term_link($newterm->idnum);?>' style="text-decoration:none; color: #000000;"><?php echo $newterm->title;?></a></div></li><?php                  
                                                    }
                                                } else {
                                                    $journalColor = get_option('journal');
                                                    $journalColorCode = $journalColor['site']['primary-color'];
                                                ?><li><div style="border-left:5px solid <?php echo $journalColorCode;?>; padding-left: 8px;"><a href='<?php echo get_term_link($newterm->idnum);?>' style="text-decoration:none; color: #000000;"><?php echo $newterm->title;?></a></div></li><?php
                                            }
                                            $countSpecialty++;
                                            if($countSpecialty == 40){
                                                break;
                                            }
                                     }
                                     
                                     
                                     
                                     
                                     
                                     
                                     ?>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="row full-list">
                            <div class="col-12">
                                <!--<h3><a href="/pages/browse-by-topic/">View full list</a></h3>-->                                
                                        <h3><a href="/pages/browse-by-topic/">View full list</a></h3>                                    
                            </div>
                        </div>
                        </section>
                    </div>

<?php
        $this->closeWidget();
    }


}

add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Specialty_Widget'); });

