<?php

namespace com\bmj\journals\theme\jnp_base {

    use org\bmj\journals\plugins\jnp_journal;

    require_once dirname(__FILE__).'/widgets.php';

    @include "version.php";
    if (!defined('JNP_BASE_VERSION')) {
        define('JNP_BASE_VERSION', date('YmdHis'));
    }

    if (isset($_GET['hwoasp'])) {
        setcookie('hwoasp', $_GET['hwoasp']);
    }
    if (isset($_GET['hwshib2'])) {
        setcookie('hwshib2', $_GET['hwshib2']);
    }

    global $jnp_base;
    $jnp_base = [];


 function custom_theme_options() {
 add_options_page( 
 'Custom Theme Options',
 'Custom Theme Options',
 'administrator',
 'custom_theme_option',
 'custom_theme_fields'
 );
}

add_action('admin_menu','custom_theme_options');


    function after_switch_theme()
    {
        jnp_journal\init();
        jnp_journal\setup_default_pages();
        jnp_journal\setup_default_menus();

        wp_set_sidebars_widgets([]);
    }
    add_action('after_switch_theme', __NAMESPACE__.'\after_switch_theme');


    function after_setup_theme()
    {
        add_image_size('largest', 1155);
        add_image_size('large', 955);
        add_image_size('medium', 735);
        add_image_size('small', 595);
        add_image_size('smallest', 440);
        add_image_size('tiny', 280);

        add_theme_support('html5', ['caption']);
    }
    add_action('after_setup_theme', __NAMESPACE__.'\after_setup_theme');


    function nav_menu_link_attributes($atts, $item, $args, $depth)
    {
        $journal = get_option('journal');

        $atts['href'] = str_replace('__prefix__', $journal['site']['prefix'], $atts['href']);

        return $atts;
    }
    add_filter('nav_menu_link_attributes', __NAMESPACE__.'\nav_menu_link_attributes', 10, 4);


    function widgets_init()
    {
        register_sidebar([
            'name'  => 'Footer Logos',
            'id'    => 'footer-logo-sidebar'
        ]);
        register_sidebar([
            'name'  => 'Social Logos',
            'id'    => 'footer-social-sidebar'
        ]);
        register_sidebar([
            'name'  => 'Front Page Main',
            'id'    => 'front-page-main'
        ]);
    }
    add_action('widgets_init', __NAMESPACE__.'\widgets_init');


    function wp_enqueue_scripts()
    {
        wp_enqueue_script('eqcss', 'https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.8.0/EQCSS.js');

        wp_enqueue_script('eqcss-polyfill', 'https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.8.0/EQCSS-polyfills.min.js', 'eqcss');
        wp_script_add_data('egcss-polyfill', 'conditional', 'lt IE 9');

        wp_enqueue_script('html5shim', get_template_directory_uri().'/js/lib/html5shiv-3.7.3.min.js');
        wp_script_add_data('html5shim', 'conditional', 'lt IE 9');
        // Comment to support the design for Case Reports - Arup//
        //wp_enqueue_style('jnp-base', get_template_directory_uri().'/css/style.css', [], JNP_BASE_VERSION);

        wp_enqueue_script('jnp-base', get_template_directory_uri().'/js/jnp-base.js', ['jquery'], JNP_BASE_VERSION);
        wp_localize_script('jnp-base', 'ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php')
        ]);
        wp_enqueue_script('feedbackify', get_template_directory_uri().'/js/feedbackify.js', [], false, true);

        $journal = get_option('journal');
        $css  = ':root { ';
        $css .= '--primaryColor: '.@$journal['site']['primary-color'].'; ';
        $css .= '}';
        $css .= '.primary-color { background-color: '.@$journal['site']['primary-color'].' !important; }';
        $css .= 'svg.primary-color-fill { fill: '.@$journal['site']['primary-color'].'; }';
        wp_add_inline_style('jnp-base', $css);
    }
    add_action('wp_enqueue_scripts', __NAMESPACE__.'\wp_enqueue_scripts');


    if (is_admin()) {
        function posts_selection()
        {
            global $post;

            if (is_object($post) && 'page-templates/no-visual.php' == get_post_meta($post->ID, '_wp_page_template', true)) {
                add_filter('user_can_richedit', function() { return false; });
            }
        }
        add_action('posts_selection', __NAMESPACE__.'\posts_selection', 100);

        function mce_buttons($buttons)
        {
            return array_diff($buttons, [ 'alignleft', 'aligncenter', 'alignright', 'wp_adv' ]);
        }
        add_filter('mce_buttons', __NAMESPACE__.'\mce_buttons');
    }


    /** Helpers **/

    /**
     *
     **/
    function get_the_title()
    {
        if (is_archive()) {
            return (false === ($term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'))))
                ? 'n/a'
                : $term->name;
        } else {
            return \get_the_title();
        }
    }

    /**
     *
     **/
    function get_the_content()
    {
        $content = 'n/a';
        if (is_archive()) {
            if ($term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')))
                $content = $term->description;
        } else {
            $content = \get_the_content();
        }

        return apply_filters('the_content', $content);
    }

    
    /**
     * Stop WP from putting hard width on figures
     */
    function img_caption_shortcode_width()
    {
        return '';
    }
    add_filter('img_caption_shortcode_width', __NAMESPACE__.'\img_caption_shortcode_width');


    /** 
     * Strip empty paragraphs
     */ 
    function the_content($content='')
    {
        return str_replace('<p>&nbsp;</p>', '', $content);
    }
    add_filter('the_content', __NAMESPACE__.'\the_content', 9999);


    function shortcode_section($atts, $content=null)
    {
        global $jnp_base;

        $jnp_base['section'] = (is_array($atts) && array_key_exists('type', $atts))
            ? ['type' => $atts['type']]
            : [];
        
        $content = do_shortcode(trim($content));

        $html = '<section class="layout">'.$content.'</section>';
        $html = str_replace('<p><div', '<div', $html);
        $html = str_replace('<p></div', '</div', $html);
        $html = str_replace('</div></p>', '</div>', $html);
        $html = preg_replace('#<div class="(.*?)"></p>#', '<div class="$1">', $html);
        $html = str_replace('<p></section>', '</section>', $html);
        $html = preg_replace('#<section class="(.*?)"></p>#', '<section class="$1">', $html);
        $html = str_replace('<p><div class="columns ', '<div class="columns ', $html);
        $html = str_replace('<p><figure ', '<figure ', $html);
        $html = str_replace('</figure></p>', '</figure>', $html);

        return $html;
    }
    add_shortcode('section', __NAMESPACE__.'\shortcode_section');

    function shortcode_layout($atts, $content=null)
    {
        global $jnp_base;

        if (array_key_exists('type', $jnp_base['section'])) {
            $type = (@array_key_exists('type', $atts))
                ? strtolower($atts['type'])
                : strtolower($jnp_base['section']['type']);
        } else {
            $a = shortcode_atts(['type' => 'A'], $atts);
            $type = strtolower($a['type']);
        }
        switch ($type) {
        case '0':
            $p = ['cols' => 1];
            break;
        case 'a':
            $p = ['cols' => 2];
            break;
        case 'b':
            $p = ['split' => '4,8,4,8'];
            break;
        case 'c':
            $p = ['split' => '6,6,12'];
            break;
        case 'd':
            $p = ['split' => '18,6'];
            break;
        case 'e':
            $p = ['split' => '6,9,9'];
            break;
        case 'f':
            $p = ['split' => '8,16'];
            break;
        case 'g':
            $p = ['split' => '8,8,8'];
            break;
        case 'h':
            return '<div class="layout-h">'.$content.'</div>';
        default:
            return 'UNNOWN LAYOUT';
        }
        return shortcode_columns(array_merge($p, ['type' => $type]), $content);
    }
    add_shortcode('layout', __NAMESPACE__.'\shortcode_layout');


    define('SHORTCODE_COLUMN_BREAK','__767c9dd56f8c3e84cbdc1620');
    function shortcode_column_break($atts)
    {
        return SHORTCODE_COLUMN_BREAK;
    }
    add_shortcode('column-break', __NAMESPACE__.'\shortcode_column_break');

    function shortcode_columns_split($atts, $content)
    {
        $a = shortcode_atts(['cols'=>2, 'split'=>'6,6', 'sep'=>true], $atts);
        if (array_key_exists('split', $atts)) {
            if (!is_array($a['split'])) {
                $a['split'] = explode(',', $a['split']);
            }
            if (array_key_exists('cols', $atts)) {
                if (count($a['split']) < $a['cols']) {
                    $t = array_sum($a['split']);
                    $a['split'][] = (24 - $t);
                }
            } else {
                $t = array_sum($a['split']);
                if ($t < 24) {
                    $a['split'][] = (24 - $t);
                }
                $a['cols'] = count($a['split']);
            }
        } else {
            $s = 24 / $a['cols'];
            $a['split'] = [];
            for ($c = 0; $c < $a['cols']; $c++) {
                $a['split'][] = $s;
            }
        }
        return $a;
    }

    function shortcode_columns($atts, $content=null)
    {
        $content = do_shortcode($content);

        $a = shortcode_columns_split($atts, $content);
        
        $slices = array_sum($a['split']);
        $html = '<div class="columns columns-'.$slices.' layout-'.$atts['type'];
        $html .= ($a['sep']) ? ' separator' : '';
        $html .= '">';

        $bare = str_replace("<br />\n", ' ', $content);
        $bare = str_replace("<ul>\n", ' ', $bare);
        $bare = str_replace("</li>\n", ' ', $bare);
        $bare = strip_tags($bare);

        $bareCols = preg_split('#'.SHORTCODE_COLUMN_BREAK.'#', $bare);
        $htmlCols = preg_split('#<p>'.SHORTCODE_COLUMN_BREAK.'</p>#', $content);

        for($col = 0; $col < count($bareCols); $col++) {
            $forcedColumns[] = [
                'totalWords' => str_word_count($bareCols[$col]),
                'bare' => ltrim($bareCols[$col]),
                'html' => $htmlCols[$col]
            ];
        }

        for ($j = 0; $j < $col-1; $j++) {
            $html .= sprintf('<div class="column col-%d"><div>%s</div></div>', $a['split'][$j], $forcedColumns[$j]['html']);
        }
        
        // do we need to split the last column?
        if (--$col < $a['cols']) {
            $remainingCols = $a['cols'] - $col;

            $totalWords = $forcedColumns[$col]['totalWords'];
            $wordsPerColumn = $totalWords / $remainingCols;
            $bareParas = explode("\n", $forcedColumns[$col]['bare']);
            $htmlParas = preg_split("#</(p|h3|h4|h5|h6|ol|ul)>#", $forcedColumns[$col]['html']);

            if ('' == trim($htmlParas[0])) {
                array_shift($htmlParas);
            }
            if ('<p>' == trim(end($htmlParas))) {
                array_pop($htmlParas);
            }
            
            for ($para = 0; $col < $a['cols']; $col++) {
                // grab the first set of paras

                $html .= sprintf('<div class="column col-%d"><div>', $a['split'][$col]);
                for ($colWords = 0, $offset = $para; $colWords <= $wordsPerColumn && $para < count($htmlParas); $para++) {
                    $p = trim($htmlParas[$para]);
                    preg_match('#^<(.*?)>#', $p, $tag);
                    $html .= "{$p}</{$tag[1]}>\n";
                    $colWords += str_word_count($bareParas[$para]);
                }
                $html .= '</div></div>';
            }
        } else {
            $html .= sprintf('<div class="column col-%d"><div>%s</div></div>', $a['split'][$j], $forcedColumns[$j]['html']);
        }

        $html .= '</div>';

        $html = str_replace('<div></p>', '<div>', $html);
        $html = str_replace('<p></div>', '</div>', $html);

        return $html;
    }
    
    

}

//namespace com\bmj\journals\theme\jnp_base\ajax {

   // function mobile_nav()
    //{
      //  get_template_part('partials/nav','mobile');
        //wp_die();
    //}
    //add_action('wp_ajax_mobile_nav', __NAMESPACE__.'\mobile_nav');
    //add_action('wp_ajax_nopriv_mobile_nav', __NAMESPACE__.'\mobile_nav');


    //function search_form_journal()
    //{
      //  get_template_part('partials/search','form-journal');
        //wp_die();
    //}
    //add_action('wp_ajax_search_form_journal', __NAMESPACE__.'\search_form_journal');
    //add_action('wp_ajax_nopriv_search_form_journal', __NAMESPACE__.'\search_form_journal');


    //function search_form_journals()
    //{
      //  get_template_part('partials/search','form-journals');
        //wp_die();
    //}
    //add_action('wp_ajax_search_form_journals', __NAMESPACE__.'\search_form_journals');
    //add_action('wp_ajax_nopriv_search_form_journals', __NAMESPACE__.'\search_form_journals');

//}

//Case Reports function

//require_once dirname(__FILE__).'/custom-function/custom-function.php';






