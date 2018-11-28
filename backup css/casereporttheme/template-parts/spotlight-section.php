<div class="col-md-8 col-sm-12 row-column-cell">
    <div>
                    <div class="widget-spotlight">
                        <header>
                        <div class="icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="-288 411.9 18 18" style="enable-background:new -288 411.9 18 18;" xml:space="preserve">
                                <style type="text/css">
                                .star{fill:#FFFFFF;}
                                .st1{fill:none;}
                                </style>
                                <path class="star" d="M-279,423.2l3.7,2.7l-1.4-4.4l3.7-2.6h-4.5l-1.5-4.5l-1.5,4.5h-4.5l3.7,2.6l-1.4,4.4L-279,423.2z"/>
                                <path class="st1" d="M-288,411.9h18v18h-18V411.9z"/>
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
                                    'posts_per_page' => -1,
                                    //'orderby' => 'menu_order',
                                    'order'     => 'DESC'
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
                                    'posts_per_page' => -1,
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
                    </div>
                </div>