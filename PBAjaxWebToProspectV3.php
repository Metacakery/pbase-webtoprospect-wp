<?php
/**
 * File Name PBAjaxWebToProspectV3.php
 * @subpackage ProjectName
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################





/**
 * PBAjaxWebToProspectV3
 *
 * @version 1.0
 * @updated 00.00.00
 **/
class PBAjaxWebToProspectV3 {
	
	
	
	/**
	 * params
	 * 
	 * @access public
	 * @var object
	 **/
	var $params = null;
	
	
	
	/**
	 * curl
	 * 
	 * @access public
	 * @var mix
	 **/
	var $curl = null;
	
	
	
	/**
	 * response
	 * 
	 * @access public
	 * @var array
	 **/
	var $response = 0;
	
	
	
	/**
	 * status
	 * 
	 * @access public
	 * @var int
	 **/
	var $status = 0;
	
	
	
	/**
	 * force_api_url
	 * 
	 * @access public
	 * @var string
	 **/
	var $force_api_url = 0;
	
	
	
	/**
	 * required_fields
	 * 
	 * @access public
	 * @var array
	 **/
	var $required_fields = array(
		'FirstName',
		'LastName',
		'Email'
	);
	
	
	
	/**
	 * body
	 * 
	 * @access public
	 * @var array
	 **/
	var $body = array(
		'prospect' => array(
			'token' => 0,
			'contact' => array(
				'LeadSource' => '',
				'FirstName' => '',
				'LastName' => '',
				'Email' => '',
			),
			// 'request' => array(),
			'requestFromListing' => '',
			'favoriteListings' => '',
			'ownerFields' => array('LastName'),
			'requestFields' => array('Name'),
			'contactFields' => array('Name')
		)
	);
	
	
	
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
		$this->set( 'force_api_url', sprintf( $this->settings->force_api_url, PBOption::get_option( 'pbase', 'force_subdomain' ) ) );

	} // end function __construct
	
	
	
	
	
	
	/**
	 * post
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function post( $_post ) {
		
		if ( isset( $_post ) AND ! empty( $_post ) AND is_array( $_post ) ) {
			$this->set( '_post', $_post );
			
			if ( $this->have_required_fields() ) {
				$this->body['prospect']['token'] = PBOption::get_option( 'pbase', 'token' );
				$this->process_post();
				$this->set( 'params', json_encode($this->body) );
				$this->curl();
				
				if ( $this->status === 200 ) {
					if ( isset( $this->response->errorMessage ) ) {
						$this->error($this->response->errorMessage);
					}
				} else if ( isset( $this->response[0]->{"message"} ) AND isset( $this->response[0]->{"errorCode"} ) ) {
					$this->error($this->response[0]->{"errorCode"});
					$this->error($this->response[0]->{"message"});
				} else {
					$this->error('bad-status');
					$this->error('status: '.$this->status);
				}
				
			} else {
				$this->error('required-fields-missing');
			}
			
		} else {
			$this->error('no-post');
		}
		
		do_action( 'PBAjaxWebToProspectV3-post-return', $this );
		
		return $this;
		
	} // end function post
	
	
	
	
	
	
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
	 * process_post
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function process_post() {
		
		
		if ( isset( $this->_post['contact'] ) AND ! empty( $this->_post['contact'] ) ) {
			$this->body['prospect']['contact'] = $this->_post['contact'];
		} else {
			$this->error('post-contact-missing');
		}
		/*if ( isset( $this->_post['request'] ) AND ! empty( $this->_post['request'] ) ) {
			$this->body['prospect']['request'] = $this->_post['request'];
		} else {
			$this->error('post-request-missing');
		}*/
		
		if ( isset( $this->_post['requestFromListing'] ) AND ! empty( $this->_post['requestFromListing'] ) ) {
			$this->body['prospect']['requestFromListing'] = $this->_post['requestFromListing'];
		} else {
			unset( $this->body['prospect']['requestFromListing'] );
		}
		if ( isset( $this->_post['favoriteListings'] ) AND ! empty( $this->_post['favoriteListings'] ) ) {
			$this->body['prospect']['favoriteListings'] = $this->_post['favoriteListings'];
		} else {
			unset( $this->body['prospect']['favoriteListings'] );
		}
		
	} // end function process_post 
	
	
	
	
	
	
	/**
	 * curl
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function curl() {
		
		if ( $this->settings->is_testing === 1 ) {
			
			$this->set( 'response', json_decode( $this->settings->test_return_obj_web2P ) );
			$this->set( 'status', 200 );
			
		} else {
			
			if ( PBOption::get_option( 'pbase', 'is_testing' ) == '1' ) {
				$this->body['prospect']['contact']['LeadSource'] = 'LeadSourceTest';
				// $this->body['prospect']['request']['ZuzsaTest__c'] = true;
				$this->body['prospect']['request']['pba__ListingType__c'] = 'LeadSourceTest';
				// $this->body['prospect']['request']['TypeOfRequest__c'] = 'ZuzsaTest';
				$this->set( 'params', json_encode($this->body) );
			}
			
			$this->set( 'curl', curl_init( $this->force_api_url ) );

			/** 
			****IMPORTANT*****
			The following line is only there to make this example 
			run without the need for importing SSL certificates
			for production scripts, make sure to import current SSL certificates, 
			otherwise there is the risk of man-in-the-middle attacks
			more info can be found here:
			- http://ademar.name/blog/2006/04/curl-ssl-certificate-problem-v.html
			- http://curl.haxx.se/docs/sslcerts.html
			**/
			curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false); //REMOVE THIS LINE IN PRODUCTION ENVIRONMENTS AND MAKE SURE SSL CERTIFICATES ARE IMPORTED INSTEAD


			curl_setopt($this->curl, CURLOPT_HEADER, false);
			curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->curl, CURLOPT_POST, true);
			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->params);
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(  "Content-type: application/json"));

			$this->set( 'response', json_decode( curl_exec($this->curl) ) );
			$this->set( 'status', curl_getinfo($this->curl, CURLINFO_HTTP_CODE) );
			curl_close($this->curl);
			
		}
		
	} // end function curl
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Conditionals
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * have_required_fields
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function have_required_fields() {
		
		$this->set( 'have_required_fields', 1 );
		foreach ( $this->required_fields as $k ) {
			if ( ! isset( $this->_post['contact'][$k] ) OR empty( $this->_post['contact'][$k] ) ) {
				$this->set( 'have_required_fields', 0 );
				return $this->have_required_fields;
			}
		}
		
		return $this->have_required_fields;
		
	} // end function have_required_fields
	
	
	
	
	
	
	/**
	 * have_errors
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function have_errors() {
		
		if ( isset( $this->errors ) AND ! empty( $this->errors ) AND is_array( $this->errors ) ) {
			$this->set( 'have_errors', 1 );
		} else {
			$this->set( 'have_errors', 0 );
		}
		
		return $this->have_errors;
		
	} // end function have_errors
	
	
	
} // end class PBAjaxWebToProspectV3