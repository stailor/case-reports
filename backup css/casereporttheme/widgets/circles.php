<?php

namespace com\bmj\journals\jnp_base\widgets;


class Circles_Widget extends \WP_Widget
{
    public function __construct()
    {
        parent::__construct('circles','JNP: Circles');

        add_action('wp_enqueue_scripts', [$this, 'wp_enqueue_scripts']);
    }

    public function wp_enqueue_scripts()
    {
        $journal = get_option('journal');

        $css = 'div.widget-circles a:hover span { background-color: '.@$journal['site']['secondary-color'].' !important; }';
        wp_add_inline_style('jnp-base', $css);
    }

    public function form($instance)
    {
?>
  <p>
    <label for="<?=$this->get_field_id('before')?>"><?=__('Text Before:')?></label>
    <textarea class="widefat" id="<?=$this->get_field_id('before')?>" name="<?=$this->get_field_name('before')?>"><?=esc_attr(@$instance['before'])?></textarea>
  </p>
  <p>
    <label for="<?=$this->get_field_id('after')?>"><?=__('Text After:')?></label>
    <textarea class="widefat" id="<?=$this->get_field_id('after')?>" name="<?=$this->get_field_name('after')?>"><?=esc_attr(@$instance['after'])?></textarea>
  </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    public function widget($args, $instance)
    {
        $journal = get_option('journal');

        include(locate_template('widgets/partials/circles.php'));
    }
}

add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Circles_Widget'); });
