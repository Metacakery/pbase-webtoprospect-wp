<?php
/**
 * Plugin Name: Property Base Web to Prospect for WordPress
 * Plugin URI: http://metacake.com/plugins/property-base-web-to-prospect-for-wordpress
 * Description: A simple for to allow submissions for web to prospect functionality of a Property Base account.
 * Version: 1.0.0
 * Author: MetaCake
 * Author URI: http://metacake.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package PBase WebToProspect
 * @version 1.0.0
 * @author MetaCake <dev@metacake.com>
 * @copyright Copyright (c) 2014, MetaCake
 * @link http://metacake.com/plugins/property-base-web-to-prospect-for-wordpress
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
####################################################################################################


if ( ! defined('PBaseWebToProspectLoad_INIT') ) {
	
	class PBSettings {
		
		
		
		/**
		 * is_testing
		 * 
		 * @access public
		 * @var bool
		 **/
		var $is_testing = 0;
		
		
		
		/**
		 * dir_name
		 * 
		 * @access public
		 * @var string
		 **/
		var $dir_name = 'pbase-webtoprospect-wp';
		
		
		
		/**
		 * Option name
		 * 
		 * @access public
		 * @var string
		 **/
		var $option_name = 'pbwtp';



		/**
		 * version
		 * 
		 * @access public
		 * @var string
		 **/
		var $version = '1.0.0';
		
		
		
		/**
		 * default_options
		 * 
		 * @access public
		 * @var string
		 **/
		var $default_options = array(
			'pbase' => array(
				'version' => 3,
				'is_testing' => 1
			),
			'pbasev3' => array(
				'LeadSource' => 'Web',
			),
			'pbasev2' => array(
				'ContactType__pc' => 'Email',
				'Specific_Lead_Source__c' => 'My website: Page: Short code',
				'general_Lead_Source__c' => 'Interactive',
				'Lead_Type__c' => 'Website Page',
				'custom-message-field' => 'NOTES__c',
			),
			'form' => array(
				'title' => 'Property Base Form',
				'error_message' => 'There was an error during your submission. Please try again.',
				'success_message' => 'Success we received your submission.',
			)
        );
		
		
		
		/**
		 * action
		 * 
		 * @access public
		 * @var string
		 **/
		var $action = 'web-to-prospect';
		
		
		
		/**
		 * force_token
		 * 
		 * @access public
		 * @var string
		 **/
		var $force_token = null;
		
		
		
		/**
		 * force_api_url
		 * 
		 * @access public
		 * @var string
		 **/
		// var $force_api_url = 'https://%1$s.force.com/services/apexrest/pba/webtoprospect/v1/';
		// var $force_api_url = 'https://%1$s.salesforce.com/services/apexrest/pba/webtoprospect/v1/';
		var $force_api_url = 'https://%1$s.secure.force.com/services/apexrest/pba/webtoprospect/v1/';
		
		
		
		/**
		 * form_action
		 * 
		 * @access public
		 * @var string
		 **/
		var $form_action = 'http://%1$s.force.com/pb__WebserviceWebToProspect';
		
		
		
		/**
		 * html_wrapper_id_web2P
		 * 
		 * @access public
		 * @var string
		 **/
		var $html_wrapper_id_web2P = 'web2prospect';
		
		
		
		/**
		 * test_return_obj
		 * 
		 * @access public
		 * @var string
		 **/
		var $test_return_obj = '{
		  "errorMessage" : null,
		  "contact" : {
		    "attributes" : {
		      "type" : "Contact",
		      "url" : "/services/data/v25.0/sobjects/Contact/003E000000QUAqnIAH"
		    },
		    "Phone" : "089-110234567",
		    "Email" : "max@mayer.de",
		    "LastName" : "Mayer"
		  },  
		  "request" : {
		    "attributes" : {
		      "type" : "Request__c",
		      "url" : "/services/data/v25.0/sobjects/Request__c/a0JE0000006XBWQMA4"
		    },
		    "Bathrooms_min__c" : 2.0,
		    "Bedrooms_min__c" : 2.0
		  },
		  "owner" : {
		    "attributes" : {
		      "type" : "User",
		      "url" : "/services/data/v25.0/sobjects/User/005E0000002OVUwIAO"
		    },
		    "Email" : "jane.doe@brokerage.com",
		    "Id" : "005E0000002OVUwIAO",
		    "LastName" : "Doe"
		  }
		}';
		
		
		
		/**
		 * __construct
		 **/
		function __construct() {
			
			$this->file_path = plugins_url();
			
		} // end function __construct
	
	
	}; // end class PBSettings
	
	
	
	// Classes
	require_once( "classes/wrapper-functions.php" );
	require_once( "PBaseWebToProspectForm.php" );
	require_once( "PBOption.php" );
	require_once( "PBWebToProspectWidgetWP.php" );
	require_once( "PBaseWebToProspectLoad.php" );
	require_once( "PBWebToProspectOptionsPage.php" );
	require_once( "PBAjax.php" );
	
	define( 'PBaseWebToProspectLoad_INIT', true );
	
} // end if ( ! defined('PBaseWebToProspectLoad_INIT') )