<?php

namespace com\bmj\journals\jnp_base\widgets;


class Footer_Logo_Widget extends \WP_Widget
{
    public function __construct($id_base        = 'footer_logo',
                                $name           = '[JNP] Footer Logo',
                                $widget_options = [
                                    'description' => 'Footer logo.'
                                ])
    {
        parent::__construct($id_base, $name, $widget_options);
    }

    public function form($instance)
    {
?>
  <p>
    <label for="<?=$this->get_field_id('title')?>"><?=__('Image Name:')?></label>
    <input class="widefat" id="<?=$this->get_field_id('title')?>" name="<?=$this->get_field_name('title')?>" type="text" value="<?=esc_attr(@$instance['title'])?>">
  </p>
  <p>
    <label for="<?=$this->get_field_id('alt')?>"><?=__('Alt Text:')?></label>
    <input class="widefat" id="<?=$this->get_field_id('alt')?>" name="<?=$this->get_field_name('alt')?>" type="text" value="<?=esc_attr(@$instance['alt'])?>">
  </p>
  <p>
    <label for="<?=$this->get_field_id('link')?>"><?=__('Link URL:')?></label>
    <input class="widefat" id="<?=$this->get_field_id('link')?>" name="<?=$this->get_field_name('link')?>" type="text" value="<?=esc_attr(@$instance['link'])?>">
  </p>
  <p>
    <label for="<?=$this->get_field_id('url')?>"><?=__('Image URL:')?></label>
    <input class="widefat" id="<?=$this->get_field_id('url')?>" name="<?=$this->get_field_name('url')?>" type="text" value="<?=esc_attr(@$instance['url'])?>">
  </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        // TODO: error messages
        $instance = array();
        $instance['title'] = strip_tags(@$new_instance['title']);
        $instance['alt'] = strip_tags(@$new_instance['alt']);
        $instance['url'] = filter_var(@$new_instance['url'], FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
        $instance['link'] = filter_var(@$new_instance['link'], FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
        $instance['size'] = getimagesize($instance['url']);

        return $instance;
    }

    public function widget($args, $instance)
    {
        include(locate_template('widgets/partials/footer-logo.php'));
    }
}

add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Footer_Logo_Widget'); });
