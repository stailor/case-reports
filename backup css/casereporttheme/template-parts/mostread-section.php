<div class="col-md-8 col-sm-12 row-column-cell">
    <div>
                    <div class="widget-most-read">
                        <header>
                            <div class="icon">
                                    <div style="background-image: url(https://adc.bmj.com/pages/wp-content/plugins/jnp-skins/default/plugins/jnp/widgets/articles/popular.png)">
                                        <svg class="primary-color-fill" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;">
                                        <polygon points="6.3,32.6 2.4,32.6 2.4,0 27.5,0 27.5,3.5 26,3.5 26,1.5 3.9,1.5 3.9,31.1 6.3,31.1"></polygon>
                                        <path d="M38.4,28.1l-6.6-0.8v-23H6.7v32.6h16.4L22.6,40l6-3.3l6.2,3.1L33.6,33L38.4,28.1z M8.2,35.4V5.8h22.1v19l-1.9-3.7 l-2.9,6.2l-6.8,1.1l5,4.7l-0.3,2.2H8.2z M28.7,35l-4.1,2.2l0.7-4.6l-3.4-3.2l4.6-0.8l2-4.2l2.1,4.1l4.6,0.6l-3.3,3.3l0.9,4.6 L28.7,35z"></path>
                                        <path d="M27.1,13.3H11.4c-0.3,0-0.5-0.4-0.5-0.8s0.2-0.8,0.5-0.8h15.7c0.3,0,0.5,0.4,0.5,0.8S27.4,13.3,27.1,13.3z"></path>
                                        <path d="M27.1,19.9H11.4c-0.3,0-0.5-0.4-0.5-0.8c0-0.4,0.2-0.8,0.5-0.8h15.7c0.3,0,0.5,0.4,0.5,0.8 C27.7,19.5,27.4,19.9,27.1,19.9z"></path>
                                        <path d="M25.6,26.5H11.4c-0.3,0-0.5-0.4-0.5-0.8c0-0.4,0.2-0.8,0.5-0.8h14.2c0.3,0,0.5,0.4,0.5,0.8 C26.1,26.1,25.8,26.5,25.6,26.5z"></path>
                                        </svg>                                    
                                </div>
                            </div>

                        <h2>Most read</h2>
                        
                        </header>
                        
                        <section>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <?php
                                    $path = 'http://casereports.bmj.com/rss/mfr.xml';
                                    $pathData = file_get_contents($path);
                                    $getData = simplexml_load_string($pathData);
                                    $mostCount = 1;
                                    foreach ($getData->item as $data){
                                        $mostreadUrl = $data->link;
                                        $mostreadTitle = $data->title;                                        
                                        $asd = $data->getNamespaces(true);
                                        $mostreadDate = $data->children($asd['prism'])[3];
                                        $newDate = date("d F,Y", strtotime($mostreadDate));
                                        $mostreadTaxo = $data->children($asd['prism'])[4];
                                        ?>
                                        <article>
                                            <header><h5><?php echo $mostreadTaxo;?>:</h5></header>
                                            <h4><a href="<?php echo $mostreadUrl;?>"><?php echo $mostreadTitle;?></a></h4>
                                            <footer><?php echo $newDate;?></footer>
                                        </article>    
                                    <?php 
                                        if($mostCount == 3){
                                            echo '</div><div class="col-md-6 col-sm-12">';
                                        }
                                        if($mostCount == 6){
                                            break;
                                        }
                                        $mostCount++;
                                        
                                    } ?>   
                            </div>
                        </div>
                        </section>
                    </div>
    </div>
                </div>