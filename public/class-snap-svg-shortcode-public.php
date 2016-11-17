<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://wepushbuttons.com.au/
 * @since      1.0.0
 *
 * @package    Snap_Svg_Shortcode
 * @subpackage Snap_Svg_Shortcode/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Snap_Svg_Shortcode
 * @subpackage Snap_Svg_Shortcode/public
 * @author     Hugh Campbell <hugh@wepushbuttons.com.au>
 */
class Snap_Svg_Shortcode_Public {


	static $add_script;
	static $svg_path;
	

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}



	static function handle_shortcode($atts) {
		self::$add_script = true;
		// actual shortcode handling here

 
	    $field_atts = shortcode_atts( array(
	        'svg' => '',
	        'script' => '',
	    ), $atts );

	   // if (!$field_atts['svg']) return;
	    if ($field_atts['script']) {
			wp_register_script('snap_svg_custom', $field_atts['script'], array(), '1.0', true);
	    };

		return '<svg class="snap-svg" data-filename="' . $field_atts['svg'] .'" ></svg>';
	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function init() {
		add_shortcode('snap_svg', array(__CLASS__, 'handle_shortcode'));
		add_action('wp_footer', array(__CLASS__, 'footer_print_scripts'));
		wp_register_script('snap_svg', plugin_dir_url( __FILE__ ) . 'js/snap.svg-min.js', array(), '1.0', true);
	}

	public function footer_print_scripts() {
		if ( ! self::$add_script )
			return;
		wp_print_scripts('snap_svg');
		wp_print_scripts('snap_svg_custom');
	}

	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Snap_Svg_Shortcode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Snap_Svg_Shortcode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/snap-svg-shortcode-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Snap_Svg_Shortcode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Snap_Svg_Shortcode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/snap-svg-shortcode-public.js', array( 'jquery' ), $this->version, false );

	}

}
