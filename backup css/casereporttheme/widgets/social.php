<?php

namespace com\bmj\journals\jnp_base\widgets;


abstract class Social_Widget extends \WP_Widget
{
    protected $prefix;
    protected $icon;

    public function __construct($id_base, $name, $widget_options = [], $control_options = [])
    {
        $this->journal = get_option('journal');

        parent::__construct($id_base, $name, $widget_options, $control_options);
    }

    public function widget($args, $instance)
    {
        include(locate_template('widgets/partials/social.php'));
    }

    public function url()
    {
        /**
         * Local link.
         */
        if (is_null($this->prefix))
            return site_url(@$this->journal['social'][$this->icon]);

        /**
         * Full URL.
         */
        if (empty($this->prefix))
            return @$this->journal['social'][$this->icon];

        /**
         * Partial link.
         */
        return $this->prefix.@$this->journal['social'][$this->icon];
    }
}

class Blogs_Social_Widget extends Social_Widget
{
    public function __construct()
    {
        $this->prefix = 'http://blogs.bmj.com/';
        $this->icon   = 'blog';
        $this->svg    = <<<__SVG_BLOGS__
<svg version="1.1" id="blog" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<style>path{fill:#fff; stroke:#fff;}</style>
<path id="speech-bubble-13-icon" d="M1.092,39.32c1.671-3.325,3.527-7.888,3.432-11.07C2.272,25.535,1,22.035,1,18.472
	C1,8.423,10.748,1.077,21.661,1.077c10.845,0,20.661,7.291,20.661,17.395c0,10.52-11.59,20.346-27.493,16.44
	C11.941,36.697,5.572,38.502,1.092,39.32z M44.608,39.41c3.036-3.661,3.346-9.136-0.02-13.28
	c-3.464,7.804-12.008,13.637-22.974,13.566c3.182,3.736,8.97,5.963,16,4.237c1.96,1.212,6.283,2.437,9.324,2.992
	C45.803,44.667,44.543,41.569,44.608,39.41z"/>
</svg>
__SVG_BLOGS__;

        parent::__construct('social_blogs','Social: Blogs');
    }
}
add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Blogs_Social_Widget'); });

class Facebook_Social_Widget extends Social_Widget
{
    public function __construct()
    {
        $this->prefix = 'https://facebook.com/';
        $this->icon   = 'facebook';
        $this->svg    = <<<__SVG_FACEBOOK__
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<style>path{fill:#fff; stroke:#fff;}</style>
<path id="facebook-icon" d="M17.91,16h-5v9h5v22h9V25h7.485l0.694-9h-8.18c0,0,0-2.199,0-3.74c0-1.851,1.323-3.26,3.111-3.26
	c1.44,0,4.889,0,4.889,0V1c0,0-5.163,0-6.304,0C21.638,1,17.91,4.597,17.91,10.471C17.91,15.59,17.91,16,17.91,16z"/>
</svg>
__SVG_FACEBOOK__;

        parent::__construct('social_facebook','Social: Facebook');
    }
}
add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Facebook_Social_Widget'); });

class GooglePlus_Social_Widget extends Social_Widget
{
    public function __construct()
    {
        $this->prefix = 'https://plus.google.com/';
        $this->icon   = 'google-plus';
        $this->svg    = <<<__SVG_GOOGLE_PLUS__
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<style>path{fill:#fff; stroke:#fff;}</style>
<g id="google-plus-icon">
	<path id="XMLID_100_" d="M47,11.232h-6.098v6.084h-3.049v-6.084h-6.1V8.19h6.1V2.108h3.049V8.19H47V11.232z M29.759,36.392
		c0,4.558-4.173,10.108-14.675,10.108C7.406,46.5,1,43.198,1,37.64c0-4.29,2.722-9.857,15.443-9.857
		c-1.89-1.535-2.354-3.684-1.198-6.01c-7.449,0-11.262-4.368-11.262-9.914C3.982,6.432,8.028,1.5,16.28,1.5c2.084,0,13.22,0,13.22,0
		l-2.955,3.092h-3.47c2.448,1.399,3.75,4.28,3.75,7.455c0,2.914-1.609,5.277-3.905,7.048c-4.077,3.142-3.033,4.897,1.236,8.005
		C28.367,30.245,29.759,32.673,29.759,36.392z M21.515,12.245C20.9,7.58,17.851,3.75,14.289,3.645
		c-3.562-0.107-5.951,3.466-5.337,8.133c0.615,4.666,4.001,7.927,7.564,8.034C20.08,19.917,22.128,16.913,21.515,12.245z
		 M25.186,36.859c0-3.84-3.509-7.498-9.4-7.498c-5.309-0.058-9.807,3.345-9.807,7.292c0,4.027,3.834,7.377,9.143,7.377
		C21.908,44.03,25.186,40.886,25.186,36.859z"/>
</g>
</svg>
__SVG_GOOGLE_PLUS__;

        parent::__construct('social_google_plus','Social: Google+');
    }
}
add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\GooglePlus_Social_Widget'); });

class RSS_Social_Widget extends Social_Widget
{
    public function __construct()
    {
        $this->prefix = null;
        $this->icon   = 'rss';
        $this->svg    = <<<__SVG_RSS__
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<style>path{fill:#fff; stroke:#fff;}</style>
<path id="rss-icon" d="M13.007,41.506c0,3.587-2.913,6.494-6.504,6.494C2.912,48,0,45.093,0,41.506c0-3.587,2.912-6.496,6.503-6.496
	C10.094,35.01,13.007,37.919,13.007,41.506z M0,16.359v9.625C12.101,26.107,21.921,35.915,22.044,48h9.635
	C31.556,30.582,17.441,16.486,0,16.359z M0,9.623c10.23,0.045,19.84,4.042,27.079,11.271C34.332,28.139,38.336,37.762,38.364,48H48
	C47.941,21.538,26.488,0.092,0,0V9.623z"/>
</svg>
__SVG_RSS__;

        parent::__construct('social_rss','Social: RSS');
    }
}
add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\RSS_Social_Widget'); });

class Soundcloud_Social_Widget extends Social_Widget
{
    public function __construct()
    {
        $this->prefix = '';
        $this->icon   = 'soundcloud';
        $this->svg    = <<<__SVG_SOUNDCLOUD__
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<style>path{fill:#fff; stroke:#fff;}</style>
<path id="soundcloud-icon" d="M47,28.355C47,31.473,44.502,34,41.422,34H25.906V14.605c0.593-0.22,1.212-0.381,1.852-0.484
	c0.5-0.077,1.013-0.121,1.536-0.121c5.194,0,9.451,4.053,9.851,9.205c0.696-0.316,1.465-0.493,2.277-0.493
	C44.502,22.712,47,25.238,47,28.355z M20.103,18.439V34h1.852V17.301c-0.412,0.461-0.783,0.962-1.104,1.497
	C20.609,18.666,20.359,18.545,20.103,18.439z M22.974,34h1.852V15.08c-0.664,0.34-1.285,0.754-1.852,1.232V34z M11.215,20.389V34
	h1.852V18.901C12.378,19.302,11.755,19.805,11.215,20.389z M5.66,23.213v10.74C5.888,33.983,6.119,34,6.354,34h0.973V23.255
	c-0.315-0.059-0.641-0.09-0.973-0.09C6.119,23.165,5.888,23.182,5.66,23.213z M3.206,32.964c0.421,0.31,0.889,0.559,1.39,0.735
	V23.464c-0.501,0.178-0.968,0.427-1.39,0.736V32.964z M8.345,23.553V34h1.852V21.752c-0.416,0.701-0.732,1.47-0.924,2.288
	C8.982,23.849,8.67,23.687,8.345,23.553z M14.178,34h1.852V17.891c-0.645,0.083-1.265,0.245-1.852,0.473V34z M17.14,34h1.852V18.067
	c-0.593-0.15-1.213-0.233-1.852-0.24V34L17.14,34z M2.297,32.115V25.05C1.489,25.999,1,27.232,1,28.583S1.489,31.165,2.297,32.115z"
	/>
</svg>
__SVG_SOUNDCLOUD__;

        parent::__construct('social_soundcloud','Social: Soundcloud');
    }
}
add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Soundcloud_Social_Widget'); });

class Twitter_Social_Widget extends Social_Widget
{
    public function __construct()
    {
        $this->prefix = 'https://twitter.com/';
        $this->icon   = 'twitter';
        $this->svg    = <<<__SVG_TWITTER__
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<style>path{fill:#fff; stroke:#fff;}</style>
<path id="twitter-icon" d="M47,9.88c-1.692,0.742-3.511,1.245-5.42,1.47c1.948-1.156,3.444-2.987,4.15-5.168
	c-1.824,1.07-3.844,1.848-5.994,2.268c-1.722-1.816-4.174-2.95-6.889-2.95c-6.091,0-10.569,5.626-9.192,11.469
	C15.811,16.579,8.857,12.86,4.202,7.21C1.73,11.407,2.92,16.9,7.124,19.68c-1.548-0.048-3.003-0.469-4.275-1.169
	c-0.103,4.327,3.03,8.374,7.569,9.277c-1.328,0.358-2.783,0.439-4.262,0.16c1.202,3.711,4.686,6.411,8.816,6.487
	C11.004,37.513,6.007,38.887,1,38.304c4.177,2.65,9.138,4.196,14.467,4.196c17.521,0,27.419-14.647,26.823-27.786
	C44.135,13.398,45.735,11.753,47,9.88z"/>
</svg>
__SVG_TWITTER__;

        parent::__construct('social_twitter','Social: Twitter');
    }
}
add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\Twitter_Social_Widget'); });

class YouTube_Social_Widget extends Social_Widget
{
    public function __construct()
    {
        $this->prefix = 'https://youtube.com/';
        $this->icon   = 'youtube';
        $this->svg    = <<<__SVG_YOUTUBE__
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<style>path{fill:#fff; stroke:#fff;}</style>
<path id="youtube-icon" d="M9.514,0.5h2.838l1.946,7.25l1.806-7.25h2.867l-3.282,10.781v7.357h-2.82v-7.357L9.514,0.5z M18.844,15.3
	c0,2.358,1.24,3.585,3.669,3.585c2.015,0,3.601-1.338,3.601-3.585V8.742c0-2.094-1.571-3.594-3.601-3.594
	c-2.205,0-3.669,1.448-3.669,3.594V15.3z M21.419,8.963c0-0.732,0.341-1.276,1.045-1.276c0.767,0,1.098,0.528,1.098,1.276v6.224
	c0,0.728-0.374,1.267-1.049,1.267c-0.693,0-1.094-0.563-1.094-1.267V8.963z M32.884,5.258v10.155
	c-0.306,0.379-0.987,1.002-1.474,1.002c-0.535,0-0.668-0.363-0.668-0.901V5.258h-2.503v11.183c0,1.32,0.407,2.389,1.75,2.389
	c0.755,0,1.808-0.392,2.894-1.669v1.477h2.505V5.258H32.884z M29.199,32.686c0.169,0.222,0.255,0.549,0.255,0.979v6.579
	c0,0.406-0.068,0.699-0.206,0.878c-0.263,0.341-0.833,0.327-1.22,0.131c-0.183-0.092-0.37-0.241-0.566-0.448v-7.941
	c0.165-0.175,0.329-0.305,0.494-0.389C28.372,32.266,28.911,32.307,29.199,32.686z M37.228,32.397c-0.886,0-1.065,0.617-1.065,1.493
	v1.291h2.108v-1.291C38.271,33.029,38.086,32.397,37.228,32.397z M44.5,41.796c0,3.15-2.569,5.704-5.74,5.704H9.24
	c-3.173,0-5.74-2.554-5.74-5.704v-14.41c0-3.151,2.567-5.704,5.74-5.704h29.52c3.171,0,5.74,2.553,5.74,5.704V41.796L44.5,41.796z
	 M13.174,28.463h2.78v-2.507H7.71v2.507h2.778V43.23h2.686V28.463L13.174,28.463z M22.729,30.488h-2.384v9.672
	c-0.292,0.363-0.938,0.954-1.405,0.954c-0.51,0-0.635-0.346-0.635-0.858v-9.768H15.92v10.65c0,2.586,1.765,2.601,3.05,1.87
	c0.475-0.271,0.932-0.666,1.374-1.184v1.407h2.384V30.488z M31.906,33.52c0-1.728-0.576-3.193-2.324-3.193
	c-0.849,0-1.581,0.538-2.122,1.19v-5.561h-2.406V43.23h2.406v-0.98c0.666,0.824,1.394,1.141,2.27,1.141
	c1.584,0,2.176-1.225,2.176-2.801V33.52z M40.724,33.914c0-2.303-1.106-3.748-3.393-3.748c-2.153,0-3.624,1.535-3.624,3.748v5.719
	c0,2.294,1.166,3.942,3.443,3.942c2.513,0,3.574-1.487,3.574-3.942v-0.957h-2.453v0.885c0,1.109-0.058,1.782-1.067,1.782
	c-0.962,0-1.041-0.826-1.041-1.782v-2.404h4.561V33.914L40.724,33.914z"/>
</svg>
__SVG_YOUTUBE__;

        parent::__construct('social_youtube','Social: YouTube');
    }
}
add_action('widgets_init', function() { register_widget(__NAMESPACE__.'\YouTube_Social_Widget'); });
