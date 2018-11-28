<div class="col-lg-6 col-md-6 col-lg-12 row-column-cell">
    <div>
                    <div class="widget-specialty">
                        <header>
                            <div class="icon">
                                <span class="icon-bp-icons-specialties"></span>
                            </div>
                            
                                <h2>Case Reports by specialty</h2>
                            
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
                                                ?><li><div style="border-left:5px solid #2862b4; padding-left: 8px;"><a href='<?php echo get_term_link($newterm->idnum);?>' style="text-decoration:none; color: #000000;"><?php echo $newterm->title;?></a></div></li><?php
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
                    </div>
                </div>