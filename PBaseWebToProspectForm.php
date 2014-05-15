<?php
/**
 * File Name PBaseWebToProspectForm.php
 * @subpackage ProjectName
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################





/**
 * PBaseWebToProspectForm
 *
 * @version 1.0
 * @updated 00.00.00
 **/
class PBaseWebToProspectForm {
	
	
	
	/**
	 * Option name
	 * 
	 * @access public
	 * @var string
	 * Description:
	 * Used for various purposes when an import may be adding content to an option.
	 **/
	var $option_name = false;
	
	
	
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
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * display
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function display() {
		
		echo self::get_display();
		
	} // end static function display
	
	
	
	
	
	
	/**
	 * get_display
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function get_display( $args = array() ) {
		global $post;
		$settings = new PBSettings();
		
		
		if ( ! PBOption::get_option( 'pbase', 'token' ) ) {
			return "Your property base token is missing.";
		} else if ( ! PBOption::get_option( 'pbase', 'force_subdomain' ) ) {
			return "Your Form is missing the force.com subdomain.";
		} else {
			$output = '';
			
			$output .= "<script type=\"text/javascript\" src=\"$settings->file_path/$settings->dir_name/js/jquery.validate.js\"></script>";
			
			// Javscript
			$output .= "<script type='text/javascript'>";

				$output .= "var PBWeb2P = " . json_encode( array(
					'adminAjax' => admin_url( 'admin-ajax.php' ),
					'action' => $settings->action,
					'nonce' => wp_create_nonce($settings->action),
					'options' => get_option('_' . $settings->option_name),
					'html_wrapper_id_web2P' => $settings->html_wrapper_id_web2P
				) ) . ";";

			$output .= "</script>";
			$output .= "<script type='text/javascript' src='$settings->file_path/$settings->dir_name/js/pbase.js'></script>";
			
			$output .= self::get_form_by_version( $args );

			return $output;
		}
		
	} // end function get_display
	
	
	
	
	
	
	/**
	 * get_form_by_version
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function get_form_by_version( $args ) {
		
		switch ( PBOption::get_option( 'pbase', 'version' ) ) {
			case '2' :
				return self::get_form_v2( $args );
				break;
			case '3' : 
				return self::get_form_v3( $args );
				break;
		}
		
	} // end static function get_form_by_version
	
	
	
	
	
	
	/**
	 * get_form_v3
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function get_form_v3( $args ) {
		global $post;
		$settings = new PBSettings();
		$output = "";
		
		
		if ( $settings->is_testing === 1 OR PBOption::get_option( 'pbase', 'is_testing' ) == 1 ) {
			$output .= "<div style=\"color:red;padding:15px 0;\">";
				$output .= "<strong>Property Base Plugin test mode is active in the following location(s).</strong>";
				
				if ( $settings->is_testing === 1 ) {
					$output .= "<br />- Plugin settings file. ";
				}
				if ( PBOption::get_option( 'pbase', 'is_testing' ) == 1 ) {
					$output .= "<br />- Options page. ";
				}
				
			$output .= "</div>";
		}
		
		
		$output .= "<div id=\"$settings->html_wrapper_id_web2P\">";
			
			$output .= self::get_form_title( $args );
			$output .= self::get_form_desc();
			
			$output .= "<div class=\"msg\" style=\"display:none;\"></div>";

			$output .= "<form name=\"$settings->html_wrapper_id_web2P\" method=\"post\" action=\"\" novalidate>";

				$output .= "<input type=\"hidden\" name=\"contact[LeadSource]\" value=\"" . PBOption::get_option( 'pbasev3', 'LeadSource' ) . "\" />";


				$output .= "<p>";
					$output .= "<label for=\"FirstName\">First name</label>";
					$output .= "<input pattern=\".{2,}\" class=\"required\" min-length=\"2\" type=\"text\" name=\"contact[FirstName]\" id=\"FirstName\" placeholder=\"First Name\" required />";
				$output .= "</p>";

				$output .= "<p>";
					$output .= "<label for=\"LastName\">Last name</label>";
					$output .= "<input pattern=\".{2,}\" class=\"required\" min-length=\"2\" type=\"text\" name=\"contact[LastName]\" id=\"LastName\" placeholder=\"Last Name\" required />";
				$output .= "</p>";

				$output .= "<p>";
					$output .= "<label for=\"Email\">Email</label>";
					$output .= "<input class=\"email required\" type=\"email\" name=\"contact[Email]\" id=\"Email\" placeholder=\"Enter Email Address\" required />";
				$output .= "</p>";
				
				if ( PBOption::get_option( 'pbasev3', 'FieldName_message' ) ) {
					$output .= "<p>";
						$output .= "<label for=\"Description\">Your Message</label>";
						$output .= "<textarea name=\"contact[" . PBOption::get_option( 'pbasev3', 'FieldName_message' ) . "]\" id=\"Description\" /></textarea>";
					$output .= "</p>";
				}

				$output .= "<input type=\"submit\" id=\"submit\" value=\"Submit\" />";

			$output .= "</form>";
			
		$output .= "</div>";
		
		return $output;
		
	} // end static function get_form_v3
	
	
	
	
	
	
	/**
	 * get_form_v2
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function get_form_v2( $args ) {
		global $post;
		$settings = new PBSettings();
		
		
		// Check for submission
		if ( isset( $_REQUEST['pbaseSubmit'] ) AND ! empty( $_REQUEST['pbaseSubmit'] ) ) {
			$pbaseSubmit = $_REQUEST['pbaseSubmit'];
		} else {
			$pbaseSubmit = 0;
		}
		
		// Build output
		$output = '';
		
		
		// Build Form
		if ( $pbaseSubmit === 0 OR $pbaseSubmit === 'error' ) {
			
			$output .= "<div id=\"$settings->html_wrapper_id_web2P\">";
				
				if ( $pbaseSubmit === 'error' ) {
					$output .= "<div class=\"msg error\">" . PBOption::get_option( 'form', 'error_message' ) . "</div>";
				}

				$output .= self::get_form_title( $args );
				$output .= self::get_form_desc();

				$output .= "<form name=\"$settings->html_wrapper_id_web2P\" method=\"get\" action=\"" . sprintf( $settings->form_action, PBOption::get_option( 'pbase', 'force_subdomain' ) ) . "\">";

					$output .= "<input type=\"hidden\" name=\"ContactType__pc\" value=\"" . PBOption::get_option( 'pbasev2', 'ContactType__pc' ) . "\" />";
					$output .= "<input type=\"hidden\" name=\"PersonLeadSource\" value=\"" . PBOption::get_option( 'pbasev2', 'PersonLeadSource' ) . "\" />";
					$output .= "<input type=\"hidden\" name=\"Specific_Lead_Source__c\" value=\"" . PBOption::get_option( 'pbasev2', 'Specific_Lead_Source__c' ); if ( PBOption::get_option( 'pbasev2', 'include__utm_campaign' ) AND isset( $_REQUEST['utm_campaign'] ) AND ! empty( $_REQUEST['utm_campaign'] ) ) { $output .= " - " . $_REQUEST['utm_campaign']; } $output .= "\" />";
					$output .= "<input type=\"hidden\" name=\"general_Lead_Source__c\" value=\"" . PBOption::get_option( 'pbasev2', 'general_Lead_Source__c' ) . "\" />";
					$output .= "<input type=\"hidden\" name=\"Lead_Type__c\" value=\"" . PBOption::get_option( 'pbasev2', 'Lead_Type__c' ) . "\" />";
					$output .= "<input type=\"hidden\" name=\"success_page\" value=\"" . get_permalink( $post->ID ) . "?pbasev2Submit=success\"/>";
					$output .= "<input type=\"hidden\" name=\"fail_page\" value=\"" . get_permalink( $post->ID ) . "?pbasev2Submit=error"; if ( PBOption::get_option( 'pbasev2', 'include__utm_campaign' ) AND isset( $_REQUEST['utm_campaign'] ) AND ! empty( $_REQUEST['utm_campaign'] ) ) { $output .= "&utm_campaign=" . $_REQUEST['utm_campaign']; } $output .= "\"/>";

					$output .= "<p>";
						$output .= "<label for=\"FirstName\">First Name</label> ";
						$output .= "<input type=\"text\" name=\"FirstName\" id=\"FirstName\" value=\"\" placeholder=\"First Name\" required />";
					$output .= "</p>";

					$output .= "<p>";
						$output .= "<label for=\"LastName\">Last Name</label> ";
						$output .= "<input type=\"text\" name=\"LastName\" id=\"LastName\" value=\"\" placeholder=\"Last Name\" required />";
					$output .= "</p>";

					$output .= "<p>";
						$output .= "<label for=\"PersonEmail\">Email</label> ";
						$output .= "<input class=\"email required\" type=\"email\" name=\"PersonEmail\" id=\"PersonEmail\" placeholder=\"Enter Email Address\" required />";
					$output .= "</p>";

					$output .= "<p>";
						$output .= "<label for=\"custom-message-field\">Message</label> ";
						$output .= "<textarea name=\"" . PBOption::get_option( 'pbasev2', 'custom-message-field' ) . "\" id=\"pb-custom-message-field\"></textarea>";
					$output .= "</p>";

					$output .= "<input type=\"submit\" id=\"submit\" value=\"Submit\" />";

				$output .= "</form>";
				
			$output .= "</div>";
		
		
		// Success
		} else if ( $pbaseSubmit == 'success' ) {
			$output .= "<div id=\"$settings->html_wrapper_id_web2P\">";
				$output .= "<div class=\"msg success\">" . PBOption::get_option( 'form', 'success_message' ) . "</div>";
			$output .= "</div>";
		}
		
		return $output;
		
	} // end static function get_form_v2
	
	
	
	
	
	
	/**
	 * get_form_title
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function get_form_title( $args ) {
		
		$output = '';
		if ( PBOption::get_option( 'form', 'title' ) ) {
			if ( isset( $args['before_title'] ) AND isset( $args['after_title'] ) ) {
				$output .= $args['before_title'] . PBOption::get_option( 'form', 'title' ) . $args['after_title'];
			} else {
				$output .= "<p><strong class=\"form-title\">" . PBOption::get_option( 'form', 'title' ) . "</strong></p>";
			}
		}
		return $output;
		
	} // end static function get_form_title
	
	
	
	
	
	
	/**
	 * get_form_desc
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function get_form_desc() {
		
		$output = '';
		if ( PBOption::get_option( 'form', 'desc' ) ) {
			$output .= "<p class=\"form-desc\">" . PBOption::get_option( 'form', 'desc' ) . "</p>";
		}
		return $output;
		
	} // end static function get_form_desc
	
	
	
	
	
	
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
	
	
	
} // end class PBaseWebToProspectForm