<?php
/**
 * File Name PBWebToProspectOptionsPage.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################


if ( ! is_admin() ) {
	return;
}




/**
 * PBWebToProspectOptionsPage
 **/
$PBWebToProspectOptionsPage = new PBWebToProspectOptionsPage();
class PBWebToProspectOptionsPage {
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 02.16.13
	 **/
	function __construct() {
		
		$this->set( 'settings', new PBSettings() );
		$this->set( 'file_path', $this->settings->file_path . "/" . $this->settings->dir_name );
		
		$this->add_options_page();
		$this->add_actions_for_options();

	} // end function __construct
	
	
	
	
	
	
	/**
	 * set
	 *
	 * @version 1.0
	 * @updated 02.10.13
	 **/
	function set( $key, $val = false ) {
		
		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}
		
	} // end function set
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * add_options_page
	 *
	 * @version 1.0
	 * @updated 02.17.14
	 **/
	function add_options_page() {
		
		create__options_page( array(

			'version' => $this->settings->version,

			'option_name' => "_" . $this->settings->option_name,
			'option_group' => $this->settings->option_name,
			'default_options' => $this->settings->default_options,

			'add_submenu_page' => array(
				'parent_slug' => 'options-general.php',
				'page_title' => __( 'Property Base Web to Prospect', 'pbwtp' ),
				'menu_title' => __( 'Property Base', 'pbwtp' ),
				'capability' => 'administrator',
			),

			// 'options_page_title' => false,
			// 'options_page_desc' => 'Options page description and general information here.',

			// Metaboxs and Optionns
			'options' => array(
				
				
				
				// pbase
				'metacake' => array(
					'meta_box' => array(
						'title' => "<img style=\"height:18px;width:auto;position:relative;top:5px;margin-right:7px;\" src=\"$this->file_path/images/icon.png\" alt=\"Zuzsa\" /> Zuzsa",
						'context' => 'normal',
						'priority' => 'core',
						// 'desc' => 'Description.',
						'callback' => array( &$this, 'custom_meta_box_option' ),
						// 'save_all_settings' => __( 'Save', 'pbwtp' ), // uses value as button text & sanitize_title_with_dashes(save_all_settings) for value
					),
					'settings' => array(
						'text' => array(
							'type' => 'blank',
							'validation' => 'blank',
							'title' => __( 'Blank', 'pbwtp' ),
							// 'desc' => __( '', 'pbwtp' ),
						)
					),
				), // end pbase
				
				
				
				'pbase' => array(
					'meta_box' => array(
						'title' => "Property Base Version",
						'context' => 'normal',
						'priority' => 'core',
						// 'desc' => 'Description.',
						// 'callback' => array( &$this, 'custom_meta_box_option' ),
						// 'save_all_settings' => __( 'Save', 'pbwtp' ), // uses value as button text & sanitize_title_with_dashes(save_all_settings) for value
					),
					'settings' => array(
						'version' => array(
							'type' => 'select',
							'validation' => 'select',
							'title' => __( 'Version Number', 'pbwtp' ),
							'desc' => __( 'Please select what version you current use within Property Base', 'pbwtp' ),
							'options' => array(
								'Select a Version' => 0,
								// 'Version 2' => 2,
								'Version 3' => 3,
							)
						),
						'force_subdomain' => array(
							'type' => 'text',
							'validation' => 'text',
							'title' => __( 'Force Sub Domain', 'pbwtp' ),
							'desc' => __( 'e.g. <strong>yoursubname</strong>.force.com', 'pbwtp' ),
						),
						'token' => array(
							'type' => 'text',
							'validation' => 'text',
							'title' => __( 'Token', 'pbwtp' ),
							// 'desc' => __( 'e.g. <strong>yoursubname</strong>.force.com', 'pbwtp' ),
						),
						/*'include__utm_campaign' => array(
							'type' => 'select',
							'validation' => 'select',
							'title' => __( 'Include utm_campaign', 'pbwtp' ),
							'desc' => __( 'This will allow the variable utm_campaign to be appended to your Specific_Lead_Source__c optional campaign data.', 'pbwtp' ),
							'options' => array(
								'Yes' => 1,
								'No' => 0
							)
						),*/
						'is_testing' => array(
							'type' => 'select',
							'validation' => 'select',
							'title' => __( 'Test Mode', 'pbwtp' ),
							'desc' => __( 'Test mode will update the Lead Source to include the word test which can be targeted in the property base system to ignored.', 'pbwtp' ),
							'options' => array(
								'Yes' => 1,
								'No' => 0
							)
						),
					),
				), // end pbase
				
				
				
				// pbasev3
				'pbasev3' => array(

					// Metabox
					'meta_box' => array(
						'title' => __( 'Property Base V3', 'pbwtp' ),
						'context' => 'normal',
						'priority' => 'core',
						// 'desc' => 'Description.',
						// 'callback' => array( &$this, 'custom_meta_box_option' ),
						// 'save_all_settings' => __( 'Save', 'pbwtp' ), // uses value as button text & sanitize_title_with_dashes(save_all_settings) for value
					),

					// settings and options
					'settings' => array(

						// Single setting and option
						'LeadSource' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'Lead Source', 'pbwtp' ),
							'desc' => __( 'e.g. <strong>Web</strong>', 'pbwtp' ),
						),
						'FieldName_message' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'PBase Message field name', 'pbwtp' ),
							'desc' => __( 'Please enter the custom field name you would like to receive the form "message" with in the contact object of property base.', 'pbwtp' ),
						),
						/*'include__utm_campaign' => array(
							'type' => 'select',
							'validation' => 'select',
							'title' => __( 'Include utm_campaign', 'pbwtp' ),
							'desc' => __( 'This will allow the variable utm_campaign to be appended to your Specific_Lead_Source__c optional campaign data.', 'pbwtp' ),
							'options' => array(
								'Yes' => 1,
								'No' => 0
							)
						),*/
					),
				), // end pbase
                
				
				
				// pbasev2
				'pbasev2' => array(

					// Metabox
					'meta_box' => array(
						'title' => __( 'Property Base V2', 'pbwtp' ),
						'context' => 'normal',
						'priority' => 'core',
						// 'desc' => 'Description.',
						// 'callback' => array( &$this, 'custom_meta_box_option' ),
						// 'save_all_settings' => __( 'Save', 'pbwtp' ), // uses value as button text & sanitize_title_with_dashes(save_all_settings) for value
					),

					// settings and options
					'settings' => array(

						// Single setting and option
						'ContactType__pc' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'ContactType__pc', 'pbwtp' ),
							'desc' => __( 'e.g. <strong>Email</strong>', 'pbwtp' ),
						),
						'Specific_Lead_Source__c' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'Specific_Lead_Source__c', 'pbwtp' ),
							'desc' => __( 'e.g. <strong>My website: Page: Short code</strong>', 'pbwtp' ),
						),
						'general_Lead_Source__c' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'general_Lead_Source__c', 'pbwtp' ),
							'desc' => __( 'e.g. <strong>Interactive</strong>', 'pbwtp' ),
						),
						'Lead_Type__c' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'Lead_Type__c', 'pbwtp' ),
							'desc' => __( 'e.g. <strong>Website Page</strong>', 'pbwtp' ),
						),
						/*'success_page' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'Success Page', 'pbwtp' ),
							'desc' => __( 'Leave this blank to have the success page return to the current page', 'pbwtp' ),
						),
						'fail_page' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'Fail Page', 'pbwtp' ),
							'desc' => __( 'Leave this blank to have the fail page return to the current page', 'pbwtp' ),
						),*/
						'custom-message-field' => array(
							'type' => 'text',
							'validation' => 'text_only',
							'title' => __( 'Custom message field', 'pbwtp' ),
							'desc' => __( 'This will be the field within property base that has been created to receive messages about the lead. e.g. <strong>NOTES__c</strong>', 'pbwtp' ),
						),
					),
				), // end pbasev2
				
				
				
				// Form
				'form' => array(

					// Metabox
					'meta_box' => array(
						'title' => __( 'Form Display', 'pbwtp' ),
						'context' => 'normal',
						'priority' => 'core',
						// 'desc' => 'Description.',
						// 'callback' => array( &$this, 'custom_meta_box_option' ),
						// 'save_all_settings' => __( 'Save', 'pbwtp' ), // uses value as button text & sanitize_title_with_dashes(save_all_settings) for value
					),

					// settings and options
					'settings' => array(

						// Single setting and option
						'title' => array(
							'type' => 'text',
							'validation' => 'text',
							'title' => __( 'Form Title', 'pbwtp' ),
						),
						'desc' => array(
							'type' => 'simple_text_editor',
							'validation' => 'text_editor',
							'title' => __( 'Form Description', 'pbwtp' ),
						),
						'error_message' => array(
							'type' => 'simple_text_editor',
							'validation' => 'text_editor',
							'title' => __( 'Submission Error text', 'pbwtp' ),
							'desc' => __( 'Please keep in mind that an email may only be entered into the Property Base system once, after that it will throw an error.', 'pbwtp' ),
						),
						'success_message' => array(
							'type' => 'simple_text_editor',
							'validation' => 'text_editor',
							'title' => __( 'Submission Success text', 'pbwtp' ),
						),
						
					),
				), // end Form
				
				
				
				// Settings
				'settings' => array(

					// Metabox
					'meta_box' => array(
						'title' => __( 'Settings', 'pbwtp' ),
						'context' => 'normal',
						'priority' => 'core',
						// 'desc' => 'Description.',
						// 'callback' => array( &$this, 'custom_meta_box_option' ),
						// 'save_all_settings' => __( 'Save', 'pbwtp' ), // uses value as button text & sanitize_title_with_dashes(save_all_settings) for value
					),

					// settings and options
					'settings' => array(

						// Single setting and option
						'remove_css' => array(
							'type' => 'select',
							'validation' => 'select',
							'title' => __( 'Remove CSS', 'pbwtp' ),
							'options' => array(
								'Yes' => 1,
								'No' => 0
							)
						),
						'reset_options' => array(
							'type' => 'checkbox',
							'validation' => 'reset_options',
							'title' => __( 'Reset Options', 'pbwtp' ),
							'desc' => __( 'Reset all options to default settings as if the plugin was just activated.', 'pbwtp' ),
						),
						'deactivate_plugin' => array(
							'type' => 'checkbox',
							'validation' => 'deactivate_plugin',
							'title' => __( 'Uninstall', 'pbwtp' ),
							'desc' => __( 'Delete all options from the database and deactivate the plugin. ', 'pbwtp' ),
						),
					),
				), // end Settings
				

			) // end options
			
		) ); // end default_settings array
	} // end function add_options_page
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Add Settings Field
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function add_actions_for_options() {
		
		// add_action( "_" . $this->settings->option_name . "-add_settings_field", array( &$this, 'add_settings_field' ), 10, 2 );
		add_action( "_" . $this->settings->option_name . "-sanitize-option", array( &$this, 'sanitize_callback' ), 10, 2 );

	} // end function add_actions_for_options






	/**
	 * Options Version Update
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 *
	 * ToDo:
	 * Add switch case for version control
	 **/
	function options_version_update( $settings ) {

		// nothing here yet

	} // end function options_version_update






	/**
	 * Add Settings Field
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function add_settings_field( $field, $raw_option ) {
		
		if ( is_array( $field ) AND ! empty( $field ) ) {
			extract( $field, EXTR_SKIP );
		} else {
			return;
		}
		
		// Options
		if ( isset( $field['options'] ) AND ! empty( $field['options'] ) ) {
			$options = $field['options'];
		} else {
			$options = false;
		}
		
		// Desc
		if ( isset( $field['desc'] ) AND ! empty( $field['desc'] ) ) {
			$desc = $field['desc'];
		} else {
			$desc = false;
		}
		
		// Desc
		if ( isset( $field['val'] ) AND ! empty( $field['val'] ) ) {
			$val = $field['val'];
		} else {
			$val = false;
		}
		
		switch ( $type ) {

			case "blank" :
				echo "<input type=\"text\" name=\"$name\" value=\"$val\" id=\"$id\" class=\"large-text\">";
				if ( $desc ) echo "<p class=\"description\">$desc</p>";
				break;

		}

	} // end function add_settings_field






	/**
	 * Sanitize Callback
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function sanitize_callback( $new_option, $option_args ) {

		switch ( $option_args['validation'] ) {

			case "deactivate_plugin" : 
				if ( $new_option == 'on' ) {
					delete_option( "_" . $this->settings->option_name );
					delete_option( "_" . $this->settings->option_name . "-version" );
					$this->deactivate_plugin();
					wp_redirect( home_url() . "/wp-admin" );
					exit;
				}
				break;
			case "reset_options" :
				if ( $new_option == 'on' ) {
					delete_option( "_" . $this->settings->option_name );
					delete_option( "_" . $this->settings->option_name . "-version" );
					$new_option = false;
				}
				break;

		}

		return $new_option;

	} // end function sanitize_callback






	/**
	 * Create Post meta form, Meta box content
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function custom_meta_box_option( $options, $metabox ) {
        $style = "background:#e9ffe9;display:inline-block;";
		?>
		<h2>Shortcode Usage:</h2>
		<p>Copy and paste the shortcode <strong style="<?php echo $style; ?>">[pbase_form]</strong> into the text-editor of a page, post or custom-post-type to insert your property base form.</p>
		<h2>Widget Usage:</h2>
		<p>Drag and drop the widget <strong style="<?php echo $style; ?>">Property Base Form Widget</strong> to the widget area of your choice to display your Property Base Form.</p>
		<?php

	} // end function custom_meta_box
	
	
	
	
	
	
	/**
	 * deactivate_plugin
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function deactivate_plugin() {

		$this->set( 'plugin_path', $this->settings->dir_name . "/" . $this->settings->dir_name . ".php" );
		
        if ( is_plugin_active( $this->plugin_path ) ) {
			deactivate_plugins( array( $this->plugin_path ) );
		}
		
	} // end function deactivate_plugin
	
	
	
} // end class PBWebToProspectOptionsPage