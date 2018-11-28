<?php
        $productTitle = get_option('bmj_option_title');
        $productContent = get_option('bmj_option_editor');
        $productVideo = get_option('bmj_option_video');
        $productButtontext = get_option('bmj_option_buttontext');
        $productButtonurl = get_option('bmj_option_buttonurl');
?>
<div class="col-md-4 col-sm-12 row-column-cell">
    <div>
                    <div class="widget-products">
                        <header>
                        <div class="icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="-285 408.9 24 24" style="enable-background:new -285 408.9 24 24;" xml:space="preserve">
                                <g id="Layer_2">
                                <path style="stroke:none;fill:#fff" class="st2" d="M-265.8,423.6c-0.6-0.6-1.2-1.2-1.2-4.1c0-3-2.2-5.4-5-5.9c0.1-0.2,0.2-0.4,0.2-0.6c0-0.6-0.5-1.1-1.1-1.1
                                s-1.1,0.5-1.1,1.1c0,0.2,0.1,0.5,0.2,0.6c-2.8,0.5-5,2.9-5,5.9c0,2.9-0.6,3.5-1.2,4.1c-1.7,1.7-0.5,4.2,1.6,4.2h3.3
                                c0,1.3,1,2.3,2.3,2.3s2.3-1,2.3-2.3h3.3C-265.4,427.7-264.1,425.3-265.8,423.6z M-273,428.6c-0.5,0-0.9-0.4-0.9-0.9h1.7
                                C-272.1,428.2-272.5,428.6-273,428.6z M-267.4,426h-11.2c-0.6,0-0.9-0.7-0.5-1.1c1-1,1.8-2,1.8-5.5c0-2.3,1.9-4.2,4.2-4.2
                                s4.2,1.9,4.2,4.2c0,3.5,0.8,4.4,1.8,5.5C-266.5,425.3-266.8,426-267.4,426L-267.4,426z"/>
                                </g>
                                </svg>
                            </div>

                        <h2><?php echo $productTitle;?></h2>
                        
                        </header>
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


