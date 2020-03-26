<?php
/**
 * Plugin Name:     ACF Cleave.js
 * Plugin URI:      https://github.com/lewebsimple/acf-cleave
 * Description:     Cleave.js field for Advanced Custom Fields v5.
 * Author:          Pascal Martineau <pascal@lewebsimple.ca>
 * Author URI:      https://lewebsimple.ca
 * License:         GPLv2 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     acf-cleave
 * Domain Path:     /languages
 * Version:         0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'acf_cleave_plugin' ) ) {

	class acf_cleave_plugin {

		public $settings;

		function __construct() {
			$this->settings = array(
				'version' => '0.2.0',
				'url'     => plugin_dir_url( __FILE__ ),
				'path'    => plugin_dir_path( __FILE__ )
			);
			add_action( 'acf/include_field_types', array( $this, 'include_field_types' ) );
		}

		function include_field_types( $version ) {
			load_plugin_textdomain( 'acf-cleave', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
			include_once( 'fields/class-acf-cleave-v5.php' );
		}


	}

	new acf_cleave_plugin();

}
