<?php
/**
 * File Name SanitizeValueWPMC.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.13
 **/
####################################################################################################



/*
wp_filter_kses
wp_strip_all_tags

Esc items -- see Related from this url
http://codex.wordpress.org/Function_Reference/esc_url_raw#Related

*/




if ( class_exists( 'SanitizeValueWPMC' ) ) return;





/**
 * SanitizeValueWPMC
 *
 * @version 1.0
 * @updated 00.00.13
 **/
class SanitizeValueWPMC {
	
	
	
	/**
	 * type
	 * 
	 * @access public
	 * @var string
	 **/
	var $type = null;
	
	
	
	/**
	 * have_type
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_type = 0;
	
	
	
	/**
	 * value
	 * 
	 * @access public
	 * @var mix
	 **/
	var $value = null;
	
	
	
	/**
	 * have_value
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_value = 0;
	
	
	
	/**
	 * filter_name
	 * 
	 * @access public
	 * @var string
	 **/
	var $filter_name = null;
	
	
	
	/**
	 * have_filter_name
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_filter_name = 0;
	
	
	
	/**
	 * args
	 * 
	 * @access public
	 * @var mix
	 **/
	var $args = null;
	
	
	
	/**
	 * have_args
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_args = 0;
	
	
	
	/**
	 * output
	 * 
	 * @access public
	 * @var mix
	 **/
	var $output = 0;
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {

	} // end function __construct
	
	
	
	
	
	
	/**
	 * set
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set( $key, $val = false ) {
		
		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}
		
	} // end function set
	
	
	
	
	
	
	/**
	 * get
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function get( $key ) {
		
		if ( isset( $key ) AND ! empty( $key ) AND isset( $this->$key ) AND ! empty( $this->$key ) ) {
			return $this->$key;
		} else {
			return false;
		}
		
	} // end function get 
	
	
	
	
	
	
	/**
	 * set_sanitize_args
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set_sanitize_args( $type, $value, $filter_name, $args ) {
		
		$this->set( 'type', $type );
		$this->set( 'value', $value );
		$this->set( 'filter_name', $filter_name );
		$this->set( 'args', $args );
		
	} // end function set_sanitize_args
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * sanitize
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize( $type, $value, $filter_name = false, $args = false ) {
		
		$this->set_sanitize_args( $type, $value, $filter_name, $args );
		
		if ( $this->have_type() AND $this->have_value() ) {
			
			$this->value = apply_filters( 'pre-sanitize_vcwp', $this->value, $type, $args, $filter_name );
			
			switch ( $type ) {
				
				case "upload" :
				case "image" :
				case "password" :
				case "text_field" :
					$this->set( 'output', sanitize_text_field( $this->value ) );
					break;
				case "text_only" :
					$this->set( 'output', strip_tags( stripslashes( $this->value ) ) );
					break;
				case "text_multi" :
					$this->sanitize__text_multi();
					break;
				case "text" : // sanitize_text_field()
				case "textarea" :
					$this->set( 'output', esc_html( stripslashes( $this->value ) ) );
					break;
				case "text_editor" :
					$this->set( 'output', stripslashes( $this->value ) );
					break;
				case "checkbox" :
					$this->sanitize__checkbox();
					break;
				case "multi_checkbox" :
					$this->sanitize__multi_checkbox();
					break;
				case "radio" :
                    $this->sanitize__radio();
					break;
				case "numeric" :
					$this->sanitize__numeric();
					break;
				case "select" :
					$this->sanitize__select();
					break;
				case "image_multi" :
					$this->sanitize__image_multi();
					break;
				case "email" : // sanitize_email()
					$this->sanitize__email();
					break;
				default :
					$this->sanitize__apply_filters();
					break;

			} // end switch ( $option_args['validation'] )
			
		} // end if ( $this->have_type() AND $this->have_value() )
		
		return apply_filters( 'after-sanitize_vcwp', $this->output, $type, $args, $filter_name );

	} // end function sanitize 
	
	
	
	
	
	
	/**
	 * sanitize__apply_filters
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__apply_filters() {
		
		if ( $this->have_filter_name() ) {
			$output = apply_filters( $this->filter_name, $this->value, $this->args );
		} else {
			$output = false;
		}
		
		$this->set( 'output', $output );
		
		return $this->output;

	} // end function sanitize__apply_filters
	
	
	
	
	
	
	/**
	 * sanitize__text_multi
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__text_multi() {
		
		if ( is_array( $this->value ) AND ! empty( $this->value ) ) {
			$output = array();
			
			foreach ( $this->value as $key => $val ) {
				$output[$key] = esc_html( stripslashes( $val ) );
			}
			
		} else {
			$output = 0;
		}
		
		$this->set( 'output', $output );
		
		return $this->output;

	} // end function sanitize__text_multi 
	
	
	
	
	
	
	/**
	 * sanitize__checkbox
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__checkbox() {
		
		if ( empty( $this->value ) ) {
			$this->set( 'output', false );
		} else if ( $this->value == 'on' ) {
			$this->set( 'output', 'on' );
		}
				
		return $this->output;

	} // end function sanitize__checkbox 
	
	
	
	
	
	
	/**
	 * sanitize__multi_checkbox
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__multi_checkbox() {
		
		if ( is_array( $this->value ) AND ! empty( $this->value ) ) {
			$output = array();
			
			foreach ( $this->value as $key => $val ) {
				if ( ! empty( $val ) ) {
					$output[$key] = $val;
				} else if ( $val == 'on' ) {
					$output[$key] = false;
				}
			}
			
			$this->set( 'output', $output );
			
		}
				
		return $this->output;

	} // end function sanitize__multi_checkbox 
	
	
	
	
	
	
	/**
	 * sanitize__radio
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__radio() {
		
		if ( empty( $this->value ) ) {
			$this->set( 'output', $this->value );
		} else {
			$this->set( 'output', false );
		}
				
		return $this->output;

	} // end function sanitize__radio 
	
	
	
	
	
	
	/**
	 * sanitize__numeric
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__numeric() {
		
		if ( is_numeric( $this->value ) ) {
			$this->set( 'output', $this->value );
		} else {
			$this->set( 'output', 0 );
		}
				
		return $this->output;

	} // end function sanitize__numeric 
	
	
	
	
	
	
	/**
	 * sanitize__select
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__select() {
		
		if ( ! empty( $this->value ) ) {
			$this->set( 'output', $this->value );
		} else {
			$this->set( 'output', false );
		}
				
		return $this->output;

	} // end function sanitize__select 
	
	
	
	
	
	
	/**
	 * sanitize__image_multi
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__image_multi() {
		
		if ( is_array( $this->value ) AND ! empty( $this->value ) ) {
			foreach ( $this->value as $key => $val ) {
			    if ( ! empty( $val ) ) {
				    $output[$key] = strip_tags( stripslashes( $val ) );
				}
			}
			
			$this->set( 'output', $output );
			
		} else {
			
			$this->set( 'output', false );
			
		}
				
		return $this->output;

	} // end function sanitize__image_multi 
	
	
	
	
	
	
	/**
	 * 	sanitize__email
	 * 
	 * @version 1.0
	 * @updated 05.08.13
	 **/
	function sanitize__email() {
		
		if ( is_email( $this->value ) ) {
			$this->set( 'output', $this->value );
		} else {
			$this->set( 'output', false );
		}
				
		return $this->output;

	} // end function sanitize__email
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * have_type
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_type() {
		
		if ( isset( $this->type ) AND ! empty( $this->type ) ) {
			$this->set( 'have_type', 1 );
		} else {
			$this->set( 'have_type', 1 );
		}
		
		return $this->have_type;
		
	} // end function have_type
	
	
	
	
	
	
	/**
	 * have_value
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_value() {
		
		if ( isset( $this->value ) ) {
			$this->set( 'have_value', 1 );
		} else {
			$this->set( 'have_value', 1 );
		}
		
		return $this->have_value;
		
	} // end function have_value
	
	
	
	
	
	
	/**
	 * have_filter_name
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_filter_name() {
		
		if ( isset( $this->filter_name ) AND ! empty( $this->filter_name ) ) {
			$this->set( 'have_filter_name', 1 );
		} else {
			$this->set( 'have_filter_name', 1 );
		}
		
		return $this->have_filter_name;
		
	} // end function have_filter_name
	
	
	
	
	
	
	/**
	 * have_args
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_args() {
		
		if ( isset( $this->args ) AND ! empty( $this->args ) ) {
			$this->set( 'have_args', 1 );
		} else {
			$this->set( 'have_args', 1 );
		}
		
		return $this->have_args;
		
	} // end function have_filter_name
	
	
	
} // end class SanitizeValueWPMC