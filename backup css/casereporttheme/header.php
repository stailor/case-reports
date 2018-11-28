<?php
$journal = get_option('journal');

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Case Reports - one page site</title>

    <!-- JOURNAL STYLES -->
    <!--<link rel="stylesheet" type="text/css" media="screen" href="https://ard.bmj.com/pages/wp-content/plugins/jnp-layouts/css/e.css?ver=c145f2bd07eb45411fd70eca75a388c7264b1045" />-->
    <!-- FOOTER STYLES -->
    <link rel="stylesheet" type="text/css" media="screen" href="https://ard.bmj.com/pages/wp-content/themes/jnp-base/css/style.css?ver=027b5ddcaa694db00be47d0039101eb81ee9cf57" />
    
    <!-- JQUERY CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- BOOTSTRAP CODE -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css">
    <script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
    <!-- MAIN STYLES -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri();?>/css/main.css" />
    <!-- MOBILE STYLES -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri();?>/css/mobile.css" />
    <!-- EXPANDABLE WIDGETS -->
    <script src="<?php echo get_template_directory_uri();?>/js/expandable-widgets.js"></script>
    <!-- HAMBURGER MENU -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri();?>/css/hamburger-menu.css" />    
    <script src="<?php echo get_template_directory_uri();?>/js/hamburger-menu.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
    <script>
      var oas_tag = oas_tag || {};
      oas_tag.url = 'oasc-eu1.247realmedia.com';
      oas_tag.sizes = function () {
        oas_tag.definePos('Top', [728,90]);
        oas_tag.definePos('Middle1', [300,250]);
        oas_tag.definePos('Bottom', [728,90]);
      };
      oas_tag.site_page = window.location.hostname + window.location.pathname;
      oas_tag.query = '';
      oas_tag.allowSizeOverride = true;
      oas_tag.analytics = true;
      oas_tag.taxonomy = '';
      (function() {
        oas_tag.version ='1'; oas_tag.loadAd = oas_tag.loadAd || function(){};
        var oas = document.createElement('script'),
            protocol = 'https:' == document.location.protocol?'https://':'http://',
            node = document.getElementsByTagName('script')[0];
        oas.type = 'text/javascript'; oas.async = true;
        oas.src = protocol + oas_tag.url + '/om/' + oas_tag.version + '.js';
        node.parentNode.insertBefore(oas, node);
      })();
    </script>
    <?php if ( is_front_page() && is_home() ) { ?>
<style>
    .email {
    background-color: #F2F7FC;
}
</style>
   <?php } else { ?>
<style>
    .email {
    background-color: #FFFFFF;
}
</style>        
    <?php } ?>
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
    <div class="container-wrapper">
        <header>

        <!-- BANNER AD -->
        <div class="row container-banner-ad">

            <div class="col-12">
                <?php /*?>
                <?php $imagePath = get_option('homepage_top_image');?>
                <img src="<?php echo $imagePath;?>" alt="banner ad"/>
                <?php */?>
                <section class="advert">
                    <div id="oas_Top">
                      <script type="text/javascript">oas_tag.loadAd("Top");</script>
                    </div>
                </section>
            </div>

        </div>

        <!-- LOGO & LOGIN -->
        <div class="row container-logo">

            <div class="col-sm-3 col-xs-12 logo">
                    <a href="//journals.bmj.com/"><img src="<?php echo get_template_directory_uri();?>/images/bmj-journals-logo.jpg" alt="bmj-journals-logo" /></a>
            </div>

            <div class="col-sm-9 col-xs-12 container-links">
                <ul>
                    <li><a href="<?php echo $journal['social']['facebook'];?>">
                        <div class="fb-icon">
                            <img src="//resources.bmj.com/repository/journals-network-project/images/wordpress/icon-footer-facebook.png" srcset="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4IDQ4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA0OCA0OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZT5wYXRoe2ZpbGw6I2ZmZjsgc3Ryb2tlOiNmZmY7fTwvc3R5bGU+CjxwYXRoIGlkPSJmYWNlYm9vay1pY29uIiBkPSJNMTcuOTEsMTZoLTV2OWg1djIyaDlWMjVoNy40ODVsMC42OTQtOWgtOC4xOGMwLDAsMC0yLjE5OSwwLTMuNzRjMC0xLjg1MSwxLjMyMy0zLjI2LDMuMTExLTMuMjYKCWMxLjQ0LDAsNC44ODksMCw0Ljg4OSwwVjFjMCwwLTUuMTYzLDAtNi4zMDQsMEMyMS42MzgsMSwxNy45MSw0LjU5NywxNy45MSwxMC40NzFDMTcuOTEsMTUuNTksMTcuOTEsMTYsMTcuOTEsMTZ6Ii8+Cjwvc3ZnPg==">
                        </div>
                    </a></li>
                    <li>
                        <a href="<?php echo $journal['social']['twitter'];?>">
                            <div class="twitter-icon">
                                <!-- <img src="images/icon-title-twitter.svg" srcset="images/icon-title-twitter.svg" alt="twitter"> -->
                                <img src="//resources.bmj.com/repository/journals-network-project/images/wordpress/icon-footer-twitter.png" srcset="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4IDQ4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA0OCA0OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZT5wYXRoe2ZpbGw6I2ZmZjsgc3Ryb2tlOiNmZmY7fTwvc3R5bGU+CjxwYXRoIGlkPSJ0d2l0dGVyLWljb24iIGQ9Ik00Nyw5Ljg4Yy0xLjY5MiwwLjc0Mi0zLjUxMSwxLjI0NS01LjQyLDEuNDdjMS45NDgtMS4xNTYsMy40NDQtMi45ODcsNC4xNS01LjE2OAoJYy0xLjgyNCwxLjA3LTMuODQ0LDEuODQ4LTUuOTk0LDIuMjY4Yy0xLjcyMi0xLjgxNi00LjE3NC0yLjk1LTYuODg5LTIuOTVjLTYuMDkxLDAtMTAuNTY5LDUuNjI2LTkuMTkyLDExLjQ2OQoJQzE1LjgxMSwxNi41NzksOC44NTcsMTIuODYsNC4yMDIsNy4yMUMxLjczLDExLjQwNywyLjkyLDE2LjksNy4xMjQsMTkuNjhjLTEuNTQ4LTAuMDQ4LTMuMDAzLTAuNDY5LTQuMjc1LTEuMTY5CgljLTAuMTAzLDQuMzI3LDMuMDMsOC4zNzQsNy41NjksOS4yNzdjLTEuMzI4LDAuMzU4LTIuNzgzLDAuNDM5LTQuMjYyLDAuMTZjMS4yMDIsMy43MTEsNC42ODYsNi40MTEsOC44MTYsNi40ODcKCUMxMS4wMDQsMzcuNTEzLDYuMDA3LDM4Ljg4NywxLDM4LjMwNGM0LjE3NywyLjY1LDkuMTM4LDQuMTk2LDE0LjQ2Nyw0LjE5NmMxNy41MjEsMCwyNy40MTktMTQuNjQ3LDI2LjgyMy0yNy43ODYKCUM0NC4xMzUsMTMuMzk4LDQ1LjczNSwxMS43NTMsNDcsOS44OHoiLz4KPC9zdmc+">
                            </div>
                        </a>
                    </li>
                    <li>                        
                        <a href="<?php echo $journal['social']['blog'];?>">                                    
                            <div class="blogs-icon">
                                <img src="<?php echo get_template_directory_uri();?>/images/icon-title-blogs.png" srcset="<?php echo get_template_directory_uri();?>/images/icon-title-blogs.png">
                            </div>
                        </a>
                    </li>
                    <?php wp_nav_menu(array('menu' => 'Journals Menu', 'container' => false, 'items_wrap' => '%3$s'));?>
                </ul>
            </div>
            
        </div>

        <!-- NAV -->
        <div class="row container-nav">
            
            <div class="col-sm-4 col-xs-12 case-reports">
                <h1><a href="<?php echo site_url();?>" class="siteLogo">BMJ Case Reports</a></h1>
                <!-- <h1><img src="images/bmj-case-reports.png" /> </h1> -->
            </div>

            <div class="col-sm-8 col-xs-12 navigation">

                <!-- HAMBURGER MENU -->
                <div class="navbar">  
                    <a id="nav-expander" class="nav-expander fixed">
                        <img class="hamburger-icon" src="<?php echo get_template_directory_uri();?>/images/icon-hamburger-menu.png" />
                    </a>
                </div>
                <nav class="nav-mobile">
                    <ul class="list-unstyled main-menu">            
                        <!--Include your navigation here-->
                        <li class="text-right icon-close"><a href="#" id="nav-close"><img src="<?php echo get_template_directory_uri();?>/images/icon-close.png" alt="close icon" class="icon-close"/></a></li>
                        <?php wp_nav_menu(array('menu' => 'Journal Menu', 'container' => false, 'items_wrap' => '%3$s'));?>
                        <?php wp_nav_menu(array('menu' => 'Journals Menu', 'container' => false, 'menu_class' => 'grey', 'items_wrap' => '%3$s'));?>
                        <li class="grey"><a href="http://casereportsbeta.bmj.com/alerts">Email alerts</a></li>
                        <li class="white-logo"><a href="//journals.bmj.com/"><img src="<?php echo get_template_directory_uri();?>/images/bmj-journals-logo.jpg" alt="bmj-journals-logo" width="120" /></a></li>
                        <li class="white">
                            <a href="#"><div class="fb-icon"><img src="//resources.bmj.com/repository/journals-network-project/images/wordpress/icon-footer-facebook.png" srcset="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4IDQ4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA0OCA0OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZT5wYXRoe2ZpbGw6I2ZmZjsgc3Ryb2tlOiNmZmY7fTwvc3R5bGU+CjxwYXRoIGlkPSJmYWNlYm9vay1pY29uIiBkPSJNMTcuOTEsMTZoLTV2OWg1djIyaDlWMjVoNy40ODVsMC42OTQtOWgtOC4xOGMwLDAsMC0yLjE5OSwwLTMuNzRjMC0xLjg1MSwxLjMyMy0zLjI2LDMuMTExLTMuMjYKCWMxLjQ0LDAsNC44ODksMCw0Ljg4OSwwVjFjMCwwLTUuMTYzLDAtNi4zMDQsMEMyMS42MzgsMSwxNy45MSw0LjU5NywxNy45MSwxMC40NzFDMTcuOTEsMTUuNTksMTcuOTEsMTYsMTcuOTEsMTZ6Ii8+Cjwvc3ZnPg==">
                            </div></a>
                        </li>
                        <li class="white">
                            <a href="#"><div class="twitter-icon"><img src="//resources.bmj.com/repository/journals-network-project/images/wordpress/icon-footer-twitter.png" srcset="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4IDQ4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA0OCA0OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZT5wYXRoe2ZpbGw6I2ZmZjsgc3Ryb2tlOiNmZmY7fTwvc3R5bGU+CjxwYXRoIGlkPSJ0d2l0dGVyLWljb24iIGQ9Ik00Nyw5Ljg4Yy0xLjY5MiwwLjc0Mi0zLjUxMSwxLjI0NS01LjQyLDEuNDdjMS45NDgtMS4xNTYsMy40NDQtMi45ODcsNC4xNS01LjE2OAoJYy0xLjgyNCwxLjA3LTMuODQ0LDEuODQ4LTUuOTk0LDIuMjY4Yy0xLjcyMi0xLjgxNi00LjE3NC0yLjk1LTYuODg5LTIuOTVjLTYuMDkxLDAtMTAuNTY5LDUuNjI2LTkuMTkyLDExLjQ2OQoJQzE1LjgxMSwxNi41NzksOC44NTcsMTIuODYsNC4yMDIsNy4yMUMxLjczLDExLjQwNywyLjkyLDE2LjksNy4xMjQsMTkuNjhjLTEuNTQ4LTAuMDQ4LTMuMDAzLTAuNDY5LTQuMjc1LTEuMTY5CgljLTAuMTAzLDQuMzI3LDMuMDMsOC4zNzQsNy41NjksOS4yNzdjLTEuMzI4LDAuMzU4LTIuNzgzLDAuNDM5LTQuMjYyLDAuMTZjMS4yMDIsMy43MTEsNC42ODYsNi40MTEsOC44MTYsNi40ODcKCUMxMS4wMDQsMzcuNTEzLDYuMDA3LDM4Ljg4NywxLDM4LjMwNGM0LjE3NywyLjY1LDkuMTM4LDQuMTk2LDE0LjQ2Nyw0LjE5NmMxNy41MjEsMCwyNy40MTktMTQuNjQ3LDI2LjgyMy0yNy43ODYKCUM0NC4xMzUsMTMuMzk4LDQ1LjczNSwxMS43NTMsNDcsOS44OHoiLz4KPC9zdmc+">
                            </div></a>
                        </li>
                        <li class="white">
                            <a href="#"><div class="blogs-icon"><img src="<?php echo get_template_directory_uri();?>/images/icon-title-blogs.png" srcset="<?php echo get_template_directory_uri();?>/images/icon-title-blogs.png"></div></a>
                        </li>
                    </ul>
                </nav>
                <!-- HAMBURGER MENU ENDS -->

                <div class="nav-desktop">
                    <?php wp_nav_menu(array('menu' => 'Journal Menu'));?>
                </div>

            </div>

        </div>

        <!-- SOCIAL MEDIA -->
        <div class="row email">
            <div class="col-md-2 col-md-offset-10 col-sm-12 email-link">
                    <div class="email">
                        <a href="http://casereportsbeta.bmj.com/alerts">
                        <div class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 22">
                            <style>.a{fill:none;}</style>
                            <rect x="0.5" y="0.5" width="32" height="21" class="a"></rect>
                            <polyline points="0.6 0.7 16.6 13.4 32.4 0.9 " class="a"></polyline>
                            <line x1="0.8" y1="21.3" x2="11.6" y2="9.8" class="a"></line>
                            <line x1="32.4" y1="21.5" x2="21.5" y2="9.7" style="fill:none;stroke-linejoin:round;"></line>
                        </svg></div>
                        <p>Email alerts</p>
                        </a>
                    </div>
            </div>

        </div>

        </header>
    
     
