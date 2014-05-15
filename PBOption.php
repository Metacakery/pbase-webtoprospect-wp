<?php
/**
 * File Name PBOption.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################





/**
 * PBOption
 *
 * @version 1.0
 * @updated 00.00.00
 **/
class PBOption {
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function __construct() {

	} // end function __construct
	
	
	
	
	
	
	/**
	 * get_option
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function get_option( $option, $setting ) {
		$settings = new PBSettings();
		
		
		if ( ! $options = wp_cache_get( $settings->option_name ) ) {
			$options = get_option("_" . $settings->option_name);
			wp_cache_set( $settings->option_name, $options );
		}
		
		if ( isset( $options ) AND isset( $options[$option][$setting] ) AND  ! empty( $options[$option][$setting] ) ) {
			return html_entity_decode( $options[$option][$setting] );
		} else {
			return false;
		}
		
	} // end function get_option
	
	
	
} // end class PBOption