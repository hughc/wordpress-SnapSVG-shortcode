<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://wepushbuttons.com.au/
 * @since      1.0.0
 *
 * @package    Snap_Svg_Shortcode
 * @subpackage Snap_Svg_Shortcode/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Snap_Svg_Shortcode
 * @subpackage Snap_Svg_Shortcode/includes
 * @author     Hugh Campbell <hugh@wepushbuttons.com.au>
 */
class Snap_Svg_Shortcode_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'snap-svg-shortcode',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
