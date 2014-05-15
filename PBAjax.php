<?php
/**
 * File Name PBAjax.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 * 
 * Note: This file requires $_POST['nonce'], $_POST['case'], DOING_AJAX and is written to 
 * be ran from the wordpress admin-ajax.php system.
 **/
####################################################################################################




/**
 * PBAjax
 *
 * @version 1.0
 * @updated 00.00.00
 **/
$PBAjax = new PBAjax();
class PBAjax {
	
	
	
	/**
	 * msg__default_error
	 * 
	 * @access public
	 * @var string
	 **/
	var $msg__error_default = 'Invalid ajax call';
	
	
	
	/**
	 * msg__default_error
	 * 
	 * @access public
	 * @var string
	 **/
	var $msg__error_nonce = 'Invalid nonce';
	
	
	
	
	
	
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
		$this->set( 'action', $this->settings->action );
		
		add_action( "wp_ajax_$this->action", array( &$this, 'do_ajax' ) );
		add_action( "wp_ajax_nopriv_$this->action", array( &$this, 'do_ajax' ) );

	} // end function __construct
	
	
	
	
	
	
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
	 * set__response
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 *
	 * Description:
	 * This function is used to add a new key=value
	 * pair to the response variable. The response variable
	 * is echoed at the end of the process with json_encode.
	 * Any key=value pair added to the response will be available
	 * in the jQuery response.
	 **/
	function set__response( $key, $val = false ) {
		
		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->response[$key] = $val;
		}
		
	} // end function set__response
	
	
	
	
	
	
	/**
	 * set__case
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function set__case() {
		
		if ( isset( $_POST['case'] ) AND ! empty( $_POST['case'] ) ) {
			$this->set( 'case', $_POST['case'] );
		}
		
	} // end function set__case 
	
	
	
	
	
	
	/**
	 * set__response_html
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function set__response_html( $val ) {
		
		if ( isset( $val ) AND ! empty( $val ) ) {
			
			if ( ! isset( $this->response['html'] ) OR empty( $this->response['html'] ) ) {
				$this->set__response( 'html', $val );
			} else {
				$this->response['html'] = $this->response['html'] . $val;
			}
		}
		
	} // end function set__response_html
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * do_ajax
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function do_ajax() {
		
		$this->set__response( 'status', 'error' );
		$this->set__response( 'message', $this->msg__error_default );
		$this->set( '_request', $_POST );
		
		if ( $this->is_doing_ajax() ) {
			
			$this->set__response( 'message', $this->msg__error_nonce );
			
			if ( $this->have_case() AND $this->have_nonce() ) {
				$this->set__case();
				
				switch ( $this->case ) {
					
					case "submit-web-to-prospect" :
						$this->submit_web_to_prospect();
						break;
					
				} // end switch ( $_POST['case'] )
			
			} // end if varify
			
			do_action( "PBAjax-$this->case", $this );
			
			header( 'Content: application/json' );
			echo json_encode( apply_filters( "PBAjax-$this->case-json-response", $this->response )  );

			die();
		
		} // end if DOING_AJAX
		
	} // end function do_ajax
	
	
	
	
	
	
	/**
	 * submit_web_to_prospect
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function submit_web_to_prospect() {
		
		if ( '3' == PBOption::get_option( 'pbase', 'version' ) ) {
			require_once( 'PBAjaxWebToProspectV3.php' );
			$PBAjax = new PBAjaxWebToProspectV3();
			parse_str( $_POST['post'], $this->post );
			$this->set( 'post', $PBAjax->post( $this->post ) );
			
			if ( $this->post->have_errors() ) {
				$this->set( 'errors', array_merge( $this->errors, $this->post->errors ) );
				
				$this->set__response( 'status', 'error' );
				$this->set__response( 'message', 'connection made' );
				$this->set__response_html( "<span class=\"errors\">" . implode( "<br />", $this->errors ) . "</span>" );
				
			} else {
				
				$this->set__response( 'status', 'success' );
				$this->set__response( 'message', 'connection made' );
				$this->set__response_html( "html here" );
				
			}
		}
		
	} // end function submit_web_to_prospect
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Conditionals
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * is_doing_ajax
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function is_doing_ajax() {
		
		if ( defined( 'DOING_AJAX') AND DOING_AJAX ) {
			$this->set( 'is_doing_ajax', 1 );
		} else {
			$this->set( 'is_doing_ajax', 0 );
		}
		
		return $this->is_doing_ajax;
	
	} // end function is_doing_ajax 
	
	
	
	
	
	
	/**
	 * have_case
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function have_case() {
		
		if ( isset( $_POST['case'] ) AND ! empty( $_POST['case'] ) ) {
			$this->set( 'have_case', 1 );
		} else {
			$this->set( 'have_case', 0 );
		}
		
		return $this->have_case;
	
	} // end function have_case
	
	
	
	
	
	
	/**
	 * have_nonce
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function have_nonce() {
		
		if ( isset( $_POST['nonce'] ) AND ! empty( $_POST['nonce'] ) AND wp_verify_nonce( $_POST['nonce'], $this->action ) ) {
			$this->set( 'have_nonce', 1 );
		} else {
			$this->set( 'have_nonce', 0 );
		}
		
		return $this->have_nonce;
	
	} // end function have_nonce
	
	
	
} // end class PBAjax