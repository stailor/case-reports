<?php
/*
 * Template Name: Page - TEST RANDOM
 */
function customize_register(\WP_Customize_Manager $wp_customize)
{
    $jnp_widgets = [];
    foreach(JNP_Widgets::getList() as $widget) {
        $jnp_widgets[get_class($widget)] = $widget->name;
    }
    asort($jnp_widgets);

    $wp_customize->add_section('boxen', ['title' => 'Boxes']);

    for ($i = 1; $i <= 8; $i++) {
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

get_header();




/*
$newArray = array();
$xmlPath = get_theme_mod('careers-featured_recruiters_xml_url');
$get = file_get_contents($xmlPath);
$arr = simplexml_load_string($get);
$itemCount = get_theme_mod('careers-featured_recruiters_item_count');

foreach($arr as $res){
    array_push($newArray,$res); 
}  
    
function multidimensional_array_rand( $array, $limit = 2 ) { 
    uksort( $array, 'callback_rand' ); 
        return array_slice( $array, 0, $limit, true ); 
    }
    
function callback_rand() {  
    return rand() > rand(); 
  } 

$outputArray =  multidimensional_array_rand( $newArray, $itemCount );
//echo '<pre>';
//print_r( multidimensional_array_rand( $newArray, 3 ) );
//echo '</pre>';

foreach($outputArray as $final){
    ?>
<article>
    <p>
        <a href="<?php echo $final->RecruiterPage;?>" title="<?php echo $final->RecruiterName;?>">
            <img alt="Carlton Professional Recruitment" src="<?php echo $final->RecruiterLogo;?>" style="max-width: 100%; height: auto">
        </a>
    </p>
</article>
<?php 
}

$path = 'http://casereports.bmj.com/rss/mfr.xml';
$pathData = file_get_contents($path);
$getData = simplexml_load_string($pathData);

foreach ($getData->item as $data){
    //echo '<pre>';
    //print_r($data);
    //echo '</pre>';
    echo $data->link.'</br>';
    echo $data->title.'</br>';
    //echo $data->description;
    echo 'TEST</br>';
    
    $asd = $data->getNamespaces(true);
    
    echo $data->children($asd['prism'])[3];
    echo $data->children($asd['prism'])[4];
    echo '<hr>';
}
 */
?>
<a class="twitter-timeline"
  href="https://twitter.com/bmj_latest"
  data-chrome="nofooter noborders">
Tweets by @The BMJ
</a>
<?php
do_widget(1);
do_widget(2);

?>
<?php
$xmlPath = 'http://api.highwire.org/collection/casereports/clinical_p/sports_and_exercise_medicine_p/sudden_death_in_sport.atom?key=d4c35d1c-7276-4c24-b845-78aabc14062c';
$get = file_get_contents($xmlPath);
$arr = simplexml_load_string($get);
print_r($arr);
get_footer();
