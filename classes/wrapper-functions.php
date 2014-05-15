<?php
/**
 * File Name wrapper-functions.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 03.22.13
 **/
#################################################################################################### */






/**
 * sanitize__value --> Wrapper Function
 *
 * @version 1.0
 * @updated	05.08.13
 **/
if ( ! function_exists( 'sanitize__value' ) ) {
	function sanitize__value( $type, $value, $filter = false, $args = false ) {

		$output = false;
		if ( ! class_exists( 'SanitizeValueWPMC' ) ) {		
			require_once( 'SanitizeValueWPMC.php' );
		}

		if ( class_exists( 'SanitizeValueWPMC' ) ) {

			$SanitizeValueWPMC = new SanitizeValueWPMC();
			$output = $SanitizeValueWPMC->sanitize( $type, $value, $filter, $args );

		}

		return $output;

	} // end function sanitize__value
}






/**
 * form__field --> Wrapper Function
 *
 * @version 1.0
 * @updated	05.15.13
 **/
if ( ! function_exists( 'form__field' ) ) {
	function form__field( $type, $name, $val, $id = false, $class = false, $desc = false, $options = false, $action = false, $args = false ) {

		$output = false;
		if ( ! class_exists( 'FormFieldsWPMC' ) ) {
			require_once( 'FormFieldsWPMC.php' );
		}

		if ( class_exists( 'FormFieldsWPMC' ) ) {

			$FormFieldsWPMC = new FormFieldsWPMC();
			$output = $FormFieldsWPMC->field( $type, $name, $val, $id, $class, $desc, $options, $action, $args );

		}

		return $output;

	} // end function form__field
}






/**
 * create__options_page --> Wrapper Function
 *
 * @version 1.0
 * @updated	05.23.13
 * 
 * Note:
 * This function MUST be ran before admin_menu
 * is only ran if is_admin()
 **/
if ( ! function_exists( 'create__options_page' ) ) {
	function create__options_page( $option_page ) {

		if ( ! is_admin() ) {
			return;
		}

		$output = false;
		if ( ! class_exists( 'OptionPageWPMC' ) ) {
			require_once( 'OptionPageWPMC.php' );
		}

		if ( class_exists( 'OptionPageWPMC' ) ) {

			$OptionPageWPMC = new OptionPageWPMC();
			$output = $OptionPageWPMC->create_page( $option_page );

		}

		return $output;

	} // end function create__options_page
}