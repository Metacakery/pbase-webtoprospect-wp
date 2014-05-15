<?php
/**
 * File Name PBaseWebToProspectLoad.php
 * @package WordPress
 * @subpackage ProjectName
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################





/**
 * PBaseWebToProspectLoad
 *
 * @version 1.0
 * @updated 00.00.00
 **/
$PBaseWebToProspectLoad = new PBaseWebToProspectLoad();
class PBaseWebToProspectLoad {
	
	
	
	/**
	 * errors
	 * 
	 * @access public
	 * @var array
	 **/
	var $errors = array();
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function __construct() {
		
		$this->set( 'settings', new PBSettings() );
		$this->set( 'file_path', $this->settings->file_path . "/" . $this->settings->dir_name );
		
		// add_action( 'plugins_loaded', array( &$this, 'i18n' ), 2 );
		
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'admin_init', array( &$this, 'admin_init' ) );
		
		add_action( 'widgets_init', array( &$this, 'widgets_init' ) );
		
		// register_activation_hook( __FILE__, array( &$this, 'activation' ) );
		
		add_action( 'plugins_loaded', array( &$this, 'shortcodes' ) );
		
		add_action( $this->settings->option_name . "-version_update", array( &$this, 'version_update' ) );

	} // end function __construct
	
	
	
	
	
	
	/**
	 * i18n
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function i18n() {

		/* Load the translation of the plugin. */
		load_plugin_textdomain( 'pbwtp', false, 'pbase-webtoprospect-wp/languages' );
		
	} // end function i18n
	
	
	
	
	
	
	/**
	 * init
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function init() {
		
		if ( ! PBOption::get_option( 'settings', 'remove_css' ) ) {
			add_action( 'wp_head', array( &$this, 'load_css' ), 9 );
		}
		
	} // end function init 
	
	
	
	
	
	
	/**
	 * admin_init
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function admin_init() {
		
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_register_scripts_and_css' ), 9 );
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
		
	} // end function admin_init
	
	
	
	
	
	
	/**
	 * widgets_init
	 *
	 * @version 1.0
	 * @updated	00.00.00
	 **/
	function widgets_init() {
		
		register_widget( 'PBWebToProspectWidgetWP' );
		
	} // end function widgets_init
	
	
	
	
	
	
	/**
	 * set
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function set( $key, $val = false ) {
		
		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}
		
	} // end function set
	
	
	
	
	
	
	/**
	 * error
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function error( $error_key ) {
		
		$this->errors[] = $error_key;
		
	} // end function error
	
	
	
	
	
	
	/**
	 * get
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function get( $key ) {
		
		if ( isset( $key ) AND ! empty( $key ) AND isset( $this->$key ) AND ! empty( $this->$key ) ) {
			return $this->$key;
		} else {
			return false;
		}
		
	} // end function get
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * activation
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function activation() {
		
		// nothing for now
		
	} // end function activation 
	
	
	
	
	
	
	/**
	 * version_update
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function version_update() {
		
		// nothing for now
		
	} // end function version_update 
	
	
	
	
	
	
	/**
	 * admin_register_scripts_and_css
	 * 
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function admin_register_scripts_and_css() {
		
		wp_register_style( 'pbase-admin', "$this->file_path/css/pbase-admin-style.css" );
		wp_register_script( 'pbase-admin', "$this->file_path/js/pbase-admin.js", array( 'jquery' ), null );
		
	} // end function admin_register_scripts_and_css
	
	
	
	
	
	
	/**
	 * admin_enqueue_scripts
	 * 
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function admin_enqueue_scripts($hook) {
		
		if ( 'settings_page_pbwtp-admin-page' == $hook ) {
			
			wp_localize_script(
	            'pbase-admin',
				'pbaseAdmin',
	            get_option( '_' . $this->settings->option_name )
	        );
			
			
			wp_enqueue_style( 'pbase-admin' );
			wp_enqueue_script( 'pbase-admin' );
		}
		
	} // end function admin_enqueue_scripts
	
	
	
	
	
	
	/**
	 * shortcodes
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function shortcodes() {
		
		add_shortcode( 'pbase_form', array( 'PBaseWebToProspectForm', 'get_display' ) );
		
	} // end function shortcodes
	
	
	
	
	
	
	/**
	 * load_css
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function load_css() {
		
		echo "\n<style type=\"text/css\" media=\"screen\">#web2prospect { display:block; padding-bottom:30px; } #web2prospect label { display:inline-block; width:100px; }</style>\n";
		
	} // function load_css
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Conditionals
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * have_something
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function have_something() {
		
		if ( isset( $this->something ) AND ! empty( $this->something ) ) {
			$this->set( 'have_something', 1 );
		} else {
			$this->set( 'have_something', 0 );
		}
		
		return $this->have_something;
		
	} // end function have_something
	
	
	
} // end class PBaseWebToProspectLoad