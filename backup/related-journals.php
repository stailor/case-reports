<?php
/** 
 * JNP Related Journals widget 
 *  
 * @package jnp-widgets 
 */

namespace com\bmj\jnp\plugins\jnp_widgets\misc;
use com\bmj\jnp\plugins\jnp_widgets\JNP_Widget;


/**
 * JNP Related Journals Widget class
 */
class Related_Journals_Widget extends JNP_Widget
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->defaults = [
            'title'         => 'Related Journals'
        ];
        parent::__construct('misc-related_journals', 'Misc: Related Journals Widget');
    }

    /**
     * @inheritdoc
     */
    public function widget($args, $instance)
    {
        $options = get_option('journal');

        $this->openWidget($instance, get_theme_mod($this->id_base.'_orientation', 'vertical'));
        echo "<div>";

        foreach($options['info']['related'] as $site) {
            $journal = get_blog_option($site, 'journal');
            $highwire = get_blog_option($site, 'highwire');
?>
<article>
<div>
  <div>
    <?php if (!empty($journal['info']['cover-image'])): ?>
    <figure class="cover-image">
      <a href="//<?=$journal['site']['prefix']?>.bmj.com/"><img src="<?=str_replace('http://','//',@$journal['info']['cover-image'])?>"
                                                                alt="<?=get_blog_option($site, 'blogname')?>"
                                                                title="Visit this journal"></a>
    </figure>
    <?php endif; ?>
    <aside>
      <h3><?=get_blog_option($site, 'blogname')?></h3>
<?php if (@$journal['site']['current-issue']): ?>
      <p><a href="//<?=$journal['site']['prefix']?>.bmj.com/content/current/">Current issue</a></p>
<?php endif; ?>
      <p><a href="//<?=$journal['site']['prefix']?>.bmj.com/">Visit this journal</a></p>
    </aside>
  </div>
</div>
</article>
<?php
        }

        echo "</div>";
        $this->closeWidget();
    }

    /**
     * @inheritdoc
     */
    public function customize_register(\WP_Customize_Manager $wp_customize, array $params = [])
    {
        parent::customize_register($wp_customize, $params);

        $setting = $this->id_base.'_orientation';
        $wp_customize->add_setting($setting, ['default' => 'vertical']);
        $wp_customize->add_control($setting, [
                                   'label'      => 'Orientation',
                                   'section'    => $this->id_base,
                                   'settings'   => $setting,
                                   'type'       => 'radio',
                                   'choices'    => [
                                            'horizontal' => 'Wide',
                                            'vertical'   => 'Tall'
                                        ]
                                   ]);
    }
}

add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Related_Journals_Widget'); });

