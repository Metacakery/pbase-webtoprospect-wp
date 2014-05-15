<?php
/**
 * File Name OptionPageWPMC.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.1
 * @updated 02.24.14
 **/
####################################################################################################





/**
 * OptionPageWPMC
 *
 * @version 1.0
 * @updated 00.00.13
 **/
class OptionPageWPMC {
	
	
	
	/**
	 * admin_menu_action_priority
	 * 
	 * @access public
	 * @var int
	 **/
	var $admin_menu_action_priority = 10;
	
	
	
	/**
	 * is_page_created
	 * 
	 * @access public
	 * @var bool
	 **/
	var $is_page_created = 0;
	
	
	
	/**
	 * have_args
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_args = 0;
	
	
	
	/**
	 * version
	 * 
	 * @access public
	 * @var int
	 **/
	var $version = 1.0;
	
	
	
	/**
	 * have_version
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_version = 0;
	
	
	
	/**
	 * existing_version
	 * 
	 * @access public
	 * @var int
	 **/
	var $existing_version = null;
	
	
	
	/**
	 * have_existing_version
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_existing_version = 0;
	
	
	
	/**
	 * have_new_version
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_new_version = 0;
	
	
	
	/**
	 * option_name
	 * 
	 * @access public
	 * @var string
	 **/
	var $option_name = null;
	
	
	
	/**
	 * have_option_name
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_option_name = 0;
	
	
	
	/**
	 * option_group
	 * 
	 * @access public
	 * @var string
	 **/
	var $option_group = null;
	
	
	
	/**
	 * have_option_group
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_option_group = 0;
	
	
	
	/**
	 * add_submenu_page
	 * 
	 * @access public
	 * @var array
	 **/
	var $add_submenu_page = array(
		'parent_slug' => 'options-general.php',
		'page_title' => 'Options Page',
		'menu_title' => 'Options Page',
		'capability' => 'administrator',
	);
	
	
	
	/**
	 * have_add_submenu_page
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_add_submenu_page = 0;
	
	
	
	/**
	 * have_add_menu_page
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_add_menu_page = 0;
	
	
	
	/**
	 * icon_url
	 * 
	 * @access public
	 * @var string
	 **/
	var $icon_url = false;
	
	
	
	/**
	 * position
	 * 
	 * @access public
	 * @var int
	 **/
	var $position = 100;
	
	
	
	/**
	 * options_page_title
	 * 
	 * @access public
	 * @var string
	 **/
	var $options_page_title = 'Options Page';
	
	
	
	/**
	 * options_page_desc
	 * 
	 * @access public
	 * @var string
	 **/
	var $options_page_desc = null;
	
	
	
	/**
	 * parent_slug
	 * 
	 * @access public
	 * @var string
	 **/
	var $parent_slug = 'options-general.php';
	
	
	
	
	/**
	 * page_title
	 * 
	 * @access public
	 * @var string
	 **/
	var $page_title = 'Options Page';
	
	
	
	/**
	 * menu_title
	 * 
	 * @access public
	 * @var string
	 **/
	var $menu_title = 'Options Page';
	
	
	
	/**
	 * capability
	 * 
	 * @access public
	 * @var string
	 **/
	var $capability = 'administrator';
	
	
	
	/**
	 * pagehook
	 * 
	 * @access public
	 * @var string
	 **/
	var $pagehook = null;
	
	
	
	/**
	 * raw_options
	 * 
	 * @access public
	 * @var array
	 **/
	var $raw_options = array();
	
	
	
	/**
	 * have_raw_options
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_raw_options = 0;
	
	
	
	/**
	 * options
	 * 
	 * @access public
	 * @var array
	 **/
	var $options = array();
	
	
	
	/**
	 * have_options
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_options = 0;
	
	
	
	/**
	 * option_page
	 * 
	 * @access public
	 * @var array
	 **/
	var $option_page = array();
	
	
	
	/**
	 * have_option_page
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_option_page = 0;
	
	
	
	/**
	 * new_options
	 * 
	 * @access public
	 * @var array
	 **/
	var $new_options = array();
	
	
	
	/**
	 * have_new_options
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_new_options = 0;
	
	
	
	/**
	 * existing_options
	 * 
	 * @access public
	 * @var array
	 **/
	var $existing_options = array();
	
	
	
	/**
	 * have_existing_options
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_existing_options = 0;
	
	
	
	/**
	 * option_block_id
	 * 
	 * @access public
	 * @var string
	 **/
	var $option_block_id = null;
	
	
	
	/**
	 * option_block
	 * 
	 * @access public
	 * @var array
	 **/
	var $option_block = array();
	
	
	
	/**
	 * raw_option_block__settings
	 * 
	 * @access public
	 * @var array
	 **/
	var $raw_option_block__settings = array();



	/**
	 * have_raw_option_block__settings
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_raw_option_block__settings = 0;
	
	
	
	/**
	 * raw_option_block__meta_box
	 * 
	 * @access public
	 * @var array
	 **/
	var $raw_option_block__meta_box = array();



	/**
	 * have_raw_option_block__meta_box
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_raw_option_block__meta_box = 0;
	
	
	
	/**
	 * raw_option_block__meta_box__title
	 * 
	 * @access public
	 * @var array
	 **/
	var $raw_option_block__meta_box__title = array();



	/**
	 * have_raw_option_block__meta_box__title
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_raw_option_block__meta_box__title = 0;
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {

		

	} // end function __construct
	
	
	
	
	
	
	/**
	 * after_setup_theme
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 *
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
	 **/
	function after_setup_theme() {
		
		// 
		
	} // end function after_setup_theme
	
	
	
	
	
	
	/**
	 * init
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/init
	 * 
	 * Description:
	 * Runs after WordPress has finished loading but before any headers are sent.
	 **/
	function init() {
		
        //
		
	} // end function init
	
	
	
	
	
	
	/**
	 * admin_menu
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/admin_menu
	 * 
	 * Description:
	 * admin_menu is triggered before any other hook when a user access the admin area.
	 * This hook doesn't provide any parameters, so it can only be used to callback a 
	 * specified function.
	 **/
	function admin_menu() {
		
		// Register Settings
		$this->register_settings();
		
		// Add admin Menus
		$this->on_admin_menu();
		
		// Deactivated for now, may come back to add this in but I don't really use it... 
		// Add Options page column support
		// add_filter( 'screen_layout_columns', array( &$this, 'on_screen_layout_columns' ), 10, 2 );
		
	} // end function admin_menu
	
	
	
	
	
	
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
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Create Page: Set
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * set__args
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__args() {
		
		// Version
		if ( isset( $this->option_page['version'] ) AND ! empty( $this->option_page['version'] ) ) {
			$this->set( 'version', $this->option_page['version'] );
		}
		
		// add_submenu_page
		if ( isset( $this->option_page['add_submenu_page'] ) AND is_array( $this->option_page['add_submenu_page'] ) AND ! empty( $this->option_page['add_submenu_page'] ) ) {
			$this->set( 'add_submenu_page', $this->option_page['add_submenu_page'] );
		}
		
		if ( isset( $this->option_page['is_add_menu_page'] ) AND ! empty( $this->option_page['is_add_menu_page'] ) ) {
			$this->set( 'have_add_menu_page', 1 );
		}
		
		// option_name
		if ( isset( $this->option_page['option_name'] ) AND ! empty( $this->option_page['option_name'] ) ) {
			$this->set( 'option_name', $this->option_page['option_name'] );
		}
		
		// option_group
		if ( $this->have_option_name() AND isset( $this->option_page['option_group'] ) AND ! empty( $this->option_page['option_group'] ) ) {
			$this->set( 'option_group', $this->option_page['option_group'] );
		}
		
		// raw_options
		if ( $this->have_option_name() AND $this->have_option_group() AND isset( $this->option_page['options'] ) AND ! empty( $this->option_page['options'] ) ) {
			$this->set( 'raw_options', $this->option_page['options'] );
		}
		
	} // end function set__args
	
	
	
	
	
	
	/**
	 * set__options_page_title
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__options_page_title() {
		
		if ( $this->have_add_submenu_page() AND isset( $this->add_submenu_page['page_title'] ) AND ! empty( $this->add_submenu_page['page_title'] ) ) {
			$this->set( 'options_page_title', $this->add_submenu_page['page_title'] );
		}
		
	} // end function set__options_page_title 
	
	
	
	
	
	
	/**
	 * set__options_page_desc
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__options_page_desc() {
		
		if ( isset( $this->option_page['options_page_desc'] ) AND ! empty( $this->option_page['options_page_desc'] ) ) {
			$this->set( 'options_page_desc', $this->option_page['options_page_desc'] );
		}
		
	} // end function set__options_page_desc
	
	
	
	
	
	
	/**
	 * Set Options Array
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__options() {
		
		if ( isset( $this->option_page['default_options'] ) AND is_array( $this->option_page['default_options'] ) AND ! empty( $this->option_page['default_options'] ) ) {
			
			$this->set( 'options', $this->option_page['default_options'] );
			
		} else if ( $this->have_raw_options() ) { 
			
			foreach ( $this->raw_options as $option_block_id => $option_block ) {
				
				if ( isset( $option_block['settings'] ) AND is_array( $option_block['settings'] ) AND ! empty( $option_block['settings'] ) ) {
					
					foreach ( $option_block['settings'] as $option_key => $option_args ) {
						
						if ( isset( $option_args['val'] ) AND ! empty( $option_args['val'] ) ) {
							$val = $option_args['val'];
						} else {
							$val = false;
						}
						
						$this->append__option_array( $option_block_id, $option_key, $val );

					}
					
				}

			}
			
		}
		
	} // end function set__options
	
	
	
	
	
	
	/**
	 * append__option_array
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function append__option_array( $key1, $key2, $val = false ) {
		
		if ( isset( $val ) AND ! empty( $val ) ) {
			$this->options[$key1][$key2] = $val;
		}
		
	} // end function append__option_array 
	
	
	
	
	
	
	/**
	 * set__existing_version
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__existing_version() {
		
		$this->set( 'existing_version', get_option( "$this->option_name-version" ) );
		
	} // end function set__existing_version
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Create Page: Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * create_page
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function create_page( $option_page = false ) {
		
		if ( is_admin() ) {
			
			$this->set( 'option_page', $option_page );
			if ( $this->have_option_page() ) {

				$this->set__args();
				if ( $this->have_args() ) { 

					$this->init__options();
					$this->update__options();

					if ( $this->confirm__set__options() ) { 

						$this->set__options_page_title();
						$this->set__options_page_desc();
						$this->set( 'is_page_created', 1 );
						
						if ( $this->have_add_menu_page ) {
							$this->set( 'admin_menu_action_priority', 9 );
						}
						
						add_action( 'admin_menu', array( &$this, 'admin_menu' ), $this->admin_menu_action_priority );

					} // end if ( $this->confirm__set__options() )

				} // end if ( $this->have_args() )

			}
			
			return $this;
			
		}
		
	} // end function create_page 
	
	
	
	
	
	
	/**
	 * init__options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function init__options() {
		
		$this->set__existing_version();
		
		if ( ! $this->have_existing_version() ) {
			$this->set__options();
			update_option( "$this->option_name-version", $this->version );
			update_option( $this->option_name, apply_filters( "init-options-$this->option_name", $this->options ) );
		}
		
	} // end function init__options
	
	
	
	
	
	
	/**
	 * update__options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function update__options() {
		
		if ( $this->have_existing_version() AND $this->have_new_version() ) {
			
			do_action( "$this->option_name-version_update", $this->option_page );
			$this->options = get_option( $this->option_name );
			
		}
		
	} // end function update__options 
	
	
	
	
	
	
	/**
	 * confirm__set__options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function confirm__set__options() {
		
		if ( ! $this->have_options() ) {
			
			$this->options = get_option( $this->option_name );
			$this->have_options();
			
		}
		
		return $this->have_options;
		
	} // end function confirm__set__options
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Create Page: Conditionals
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * have_version
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_version() {
		
		if ( isset( $this->version ) AND ! empty( $this->version ) ) {
			$this->set( 'have_version', 1 );
		} else {
			$this->set( 'have_version', 0 );
		}
		
		return $this->have_version;
		
	} // end function have_version 
	
	
	
	
	
	
	/**
	 * have_existing_version
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_existing_version() {
		
		if ( isset( $this->existing_version ) AND ! empty( $this->existing_version ) AND $this->existing_version > 0 ) {
			$this->set( 'have_existing_version', 1 );
		} else {
			$this->set( 'have_existing_version', 0 );
		}
		
		return $this->have_existing_version;
		
	} // end function have_existing_version 
	
	
	
	
	
	
	/**
	 * have_new_version
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_new_version() {
		
		if ( $this->have_existing_version() AND $this->existing_version > $this->version ) {
			$this->set( 'have_new_version', 1 );
		} else {
			$this->set( 'have_new_version', 0 );
		}
		
		return $this->have_new_version;
		
	} // end function have_new_version
	
	
	
	
	
	
	/**
	 * have_args
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_args() {
		
		if ( $this->have_version() AND $this->have_option_name() AND $this->have_option_group() AND $this->have_add_submenu_page() AND $this->have_raw_options() ) {
			$this->set( 'have_args', 1 );
		} else {
			$this->set( 'have_args', 0 );
		}
		
		return $this->have_args;
		
	} // end function have_args
	
	
	
	
	
	
	/**
	 * have_option_name
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_option_name() {
		
		if ( isset( $this->option_name ) AND ! empty( $this->option_name ) ) {
			$this->set( 'have_option_name', 1 );
		} else {
			$this->set( 'have_option_name', 0 );
		}
		
		return $this->have_option_name;
		
	} // end function have_option_name 
	
	
	
	
	
	
	/**
	 * have_option_group
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_option_group() {
		
		if ( isset( $this->option_group ) AND ! empty( $this->option_group ) ) {
			$this->set( 'have_option_group', 1 );
		} else {
			$this->set( 'have_option_group', 0 );
		}
		
		return $this->have_option_group;
		
	} // end function have_option_group 
	
	
	
	
	
	
	/**
	 * have_add_submenu_page
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_add_submenu_page() {
		
		if ( isset( $this->add_submenu_page ) AND is_array( $this->add_submenu_page ) AND ! empty( $this->add_submenu_page ) ) {
			$this->set( 'have_add_submenu_page', 1 );
		} else {
			$this->set( 'have_add_submenu_page', 0 );
		}
		
		return $this->have_add_submenu_page;
		
	} // end function have_add_submenu_page 
	
	
	
	
	
	
	/**
	 * have_raw_options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_raw_options() {
		
		if ( isset( $this->raw_options ) AND is_array( $this->raw_options ) AND ! empty( $this->raw_options ) ) {
			$this->set( 'have_raw_options', 1 );
		} else {
			$this->set( 'have_raw_options', 0 );
		}
		
		return $this->have_raw_options;
		
	} // end function have_raw_options 
	
	
	
	
	
	
	/**
	 * have_options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_options() {
		
		if ( isset( $this->options ) AND is_array( $this->options ) ) {
			$this->set( 'have_options', 1 );
		} else {
			$this->set( 'have_options', 0 );
		}
		
		return $this->have_options;
		
	} // end function have_options
	
	
	
	
	
	
	/**
	 * have_option_page
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_option_page() {
		
		if ( isset( $this->option_page ) AND is_array( $this->option_page ) AND ! empty( $this->option_page ) ) {
			$this->set( 'have_option_page', 1 );
		} else {
			$this->set( 'have_option_page', 0 );
		}
		
		return $this->have_option_page;
		
	} // end function have_option_page
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Admin: Set
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * set__option_validation
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__option_validation() {

		if ( isset( $this->raw_option_args['validation'] ) AND ! empty( $this->raw_option_args['validation'] ) ) {
			$this->set( 'option_validation', $this->raw_option_args['validation'] );
		} else {
			$this->set( 'option_validation', false );
		}

	} // end set__option_validation 
	
	
	
	
	
	
	/**
	 * set__option_value
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__option_value() {

		if ( isset( $this->new_options[$this->option_block_id][$this->raw_option_key] ) AND ! empty( $this->new_options[$this->option_block_id][$this->raw_option_key] ) ) {
			$this->set( 'option_value', $this->new_options[$this->option_block_id][$this->raw_option_key] );
		} else {
			$this->set( 'option_value', false );
		}

	} // end set__option_value
	
	
	
	
	
	
	/**
	 * set__parent_slug
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__parent_slug() {
		
		if ( $this->have_add_submenu_page() AND isset( $this->add_submenu_page['parent_slug'] ) AND ! empty( $this->add_submenu_page['parent_slug'] ) ) {
			$this->set( 'parent_slug', $this->add_submenu_page['parent_slug'] );
		}
		
	} // end function set__parent_slug 
	
	
	
	
	
	
	/**
	 * set__parent_slug
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__page_title() {
		
		if ( $this->have_add_submenu_page() AND isset( $this->add_submenu_page['page_title'] ) AND ! empty( $this->add_submenu_page['page_title'] ) ) {
			$this->set( 'page_title', $this->add_submenu_page['page_title'] );
		}
		
	} // end function set__page_title 
	
	
	
	
	
	
	/**
	 * set__menu_title
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__menu_title() {
		
		if ( $this->have_add_submenu_page() AND isset( $this->add_submenu_page['menu_title'] ) AND ! empty( $this->add_submenu_page['menu_title'] ) ) {
			$this->set( 'menu_title', $this->add_submenu_page['menu_title'] );
		}
		
	} // end function set__menu_title 
	
	
	
	
	
	
	/**
	 * set__capability
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__capability() {
		
		if ( $this->have_add_submenu_page() AND isset( $this->add_submenu_page['capability'] ) AND ! empty( $this->add_submenu_page['capability'] ) ) {
			$this->set( 'capability', $this->add_submenu_page['capability'] );
		}
		
	} // end function set__capability 
	
	
	
	
	
	
	/**
	 * update__raw_option_block__meta_box
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function update__raw_option_block__meta_box() {
		
		if ( ! isset( $this->raw_option_block__meta_box['context'] ) AND empty( $this->raw_option_block__meta_box['context'] ) ) {
			$this->raw_option_block__meta_box['context'] = 'normal';
		}
		
		if ( ! isset( $this->raw_option_block__meta_box['priority'] ) AND empty( $this->raw_option_block__meta_box['priority'] ) ) {
			$this->raw_option_block__meta_box['priority'] = '';
		}
		
		if ( ! isset( $this->raw_option_block__meta_box['callback'] ) AND empty( $this->raw_option_block__meta_box['callback'] ) ) {
			$this->raw_option_block__meta_box['callback'] = array( &$this, 'add_settings_section' );
		}
		
	} // end function update__raw_option_block__meta_box
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Admin: Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Register Settings
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function register_settings() {
		
		register_setting( $this->option_group, $this->option_name, array( &$this, 'sanitize_callback' ) );

	} // end register_options
	
	
	
	
	
	
	/**
	 * Sanitize Callback
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function sanitize_callback( $new_options ) {
		
		$this->set( 'new_options', $new_options );
		$this->set( 'existing_options', get_option( $this->option_name ) );
		
		if ( $this->have_existing_options() AND $this->have_new_options() ) {
			
			foreach ( $this->new_options as $this->option_block_id => $this->option_block ) {
				
				if ( $this->have_raw_option_block__settings() ) {
					
					$this->set( 'raw_option_block__settings', $this->raw_options[$this->option_block_id]['settings'] );
					
					foreach ( $this->raw_option_block__settings as $this->raw_option_key => $this->raw_option_args ) {
						
						$this->set__option_validation();
						$this->set__option_value();
						
						if ( function_exists( 'sanitize__value' ) ) {
							$this->existing_options[$this->option_block_id][$this->raw_option_key] = sanitize__value( $this->option_validation, $this->option_value, "$this->option_name-sanitize-option", $this->raw_option_args );
						} else {
							wp_die('Function sanitize__value is missing.');
						}
						
					} // end foreach ( $default_settings )

				}

			} // end foreach ( $new_options as $option_block_id => $option )
			
		}
		
		return $this->existing_options;
		
	} // end function sanitize_callback
	
	
	
	
	
	
	/**
	 * Admin Menu
	 *
	 * @version 1.1
	 * @updated 02.24.14
	 * 
	 * ToDo:
	 * This should be compatible with a top-level menu page as well.
	 **/
	function on_admin_menu() {
		
		$this->set__parent_slug();
		$this->set__page_title();
		$this->set__menu_title();
		
		if ( $this->have_add_menu_page ) {
			$this->pagehook = add_menu_page( $this->page_title, $this->menu_title, $this->capability, "$this->option_group-admin-page", array( &$this, 'on_show_page' ), $this->icon_url, $this->position );
		} else {
			$this->pagehook = add_submenu_page( $this->parent_slug, $this->page_title, $this->menu_title, $this->capability, "$this->option_group-admin-page", array( &$this, 'on_show_page' ) );
		}
		
		// Load Page Hook
		add_action( "load-$this->pagehook", array( &$this, 'on_load_page' ) );

	} // function on_admin_menu
	
	
	
	
	
	
	/**
	 * On Load Page
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function on_load_page() {
		
		wp_enqueue_script('common');
		wp_enqueue_script('editor');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_style('thickbox');
		
		$this->options = get_option( $this->option_name );
		
		// Add Meta Boxes
		foreach ( $this->raw_options as $this->option_block_id => $option_block ) {
			
			// Add Setting Section
			if ( $this->have_raw_option_block__settings() AND $this->have_raw_option_block__meta_box() AND $this->have_raw_option_block__meta_box__title() ) {
				$this->set( 'raw_option_block__settings', $this->raw_options[$this->option_block_id]['settings'] );
				$this->set( 'raw_option_block__meta_box', $this->raw_options[$this->option_block_id]['meta_box'] );
				$this->set( 'raw_option_block__meta_box__title', $this->raw_options[$this->option_block_id]['meta_box']['title'] );
				
				$this->update__raw_option_block__meta_box();
				
				// add_meta_box( $id, $title, $callback, $page, $context, $priority, $callback_args )
				add_meta_box( $this->option_block_id, $this->raw_option_block__meta_box__title, $this->raw_option_block__meta_box['callback'], $this->pagehook, $this->raw_option_block__meta_box['context'], $this->raw_option_block__meta_box['priority'], $this->raw_option_block__settings );
				
				// add_settings_section( $id, $title, $callback, $page ); // $this->pagehook . "_" . $this->option_block_id . "_callback"
				add_settings_section( $this->option_block_id, "", array( &$this, "settings_section_callback" ), $this->pagehook . "_" . $this->option_block_id . "_page" );
				
				foreach ( $this->raw_option_block__settings as $this->raw_option_key => $this->raw_option_args ) {
					
					if ( isset( $this->options[$this->option_block_id][$this->raw_option_key] ) AND ! empty( $this->options[$this->option_block_id][$this->raw_option_key] ) ) {
						$this->raw_option_args['val'] = $this->options[$this->option_block_id][$this->raw_option_key];
					}
					
					$this->option_args = array( 'option_block_id' => $this->option_block_id, 'option_key' => $this->raw_option_key, 'args' => $this->raw_option_args );
					
					// add_settings_field( $id, $title, $callback, $page, $section, $args )
					add_settings_field( $this->raw_option_key, $this->raw_option_args['title'], array( &$this, 'add_settings_field' ), $this->pagehook . "_" . $this->option_block_id . "_page", $this->option_block_id, $this->option_args );
					
				} // end foreach
				
			}
			
		} // end foreach
		
	} // function on_load_page
	
	
	
	
	
	
	/**
	 * Settings Section Callback
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function settings_section_callback( $args ) {
		
		do_action( "$this->pagehook-" . $args['id'] );
		
	} // end function settings_section_callback
	
	
	
	
	
	
	/**
	 * Add Settings Section
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function add_settings_section( $options, $metabox ) {
		
		if ( isset( $this->raw_options[$metabox['id']]['meta_box']['desc'] ) AND ! empty( $this->raw_options[$metabox['id']]['meta_box']['desc'] ) ) {
			echo "<p class=\"description\">" . $this->raw_options[$metabox['id']]['meta_box']['desc'] . "</p>";
		}
		
		do_settings_sections( $this->pagehook . "_" . $metabox['id'] . "_page" );
				
		if ( isset( $this->raw_options[$metabox['id']]['meta_box']['save_all_settings'] ) AND ! empty( $this->raw_options[$metabox['id']]['meta_box']['save_all_settings'] ) ) {
			echo "<p><input type=\"submit\" value=\"" . esc_attr( strip_tags( $this->raw_options[$metabox['id']]['meta_box']['save_all_settings'] ) ) . "\" class=\"button-primary\" name=\"" . sanitize_title_with_dashes( $this->raw_options[$metabox['id']]['meta_box']['save_all_settings'] ) . "\"/></p>";
		}
		
	} // end function add_settings_section add_settings_section
	
	
	
	
	
	
	/**
	 * Add Settings Field
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function add_settings_field( $field ) {
		
		if ( isset( $field['args'] ) AND is_array( $field['args'] ) AND ! empty( $field['args'] ) ) {
			extract( $field['args'], EXTR_SKIP );
		} else {
			return;
		}
		
		// Options
		if ( isset( $field['args']['options'] ) AND ! empty( $field['args']['options'] ) ) {
			$options = $field['args']['options'];
		} else {
			$options = false;
		}
		
		// Desc
		if ( isset( $field['args']['desc'] ) AND ! empty( $field['args']['desc'] ) ) {
			$desc = $field['args']['desc'];
		} else {
			$desc = false;
		}
		
		// Desc
		if ( isset( $field['args']['val'] ) AND ! empty( $field['args']['val'] ) ) {
			$val = $field['args']['val'];
		} else {
			$val = false;
		}
		
		// form__field( $type, $name, $val, $id = false, $class = false, $desc = false, $options = false, $action = false, $action_args2 = false )
		if ( function_exists( 'form__field' ) ) {
			form__field( 
				$field['args']['type'], // type
				$this->option_name . "[" . $field['option_block_id'] . "][" . $field['option_key'] . "]",  // name
				$val, // val
				$field['option_key'], // id
				'', // class
				$desc, // description
				$options,// options
				"$this->option_name-add_settings_field", // actions
				$field['args']
				);
		} else {
			wp_die('Function form__field is missing.');
		}
		
	} // end function add_settings_field
	
	
	
	
	
	
	/**
	 * Options Page HTML
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function on_show_page() {
		global $screen_layout_columns;
		
		?>
		<div id="<?php echo $this->pagehook; ?>-wrap" class="wrap">
			
			<?php screen_icon(); ?>
			<h2><?php echo $this->options_page_title; ?></h2>
			
			<?php if ( $this->options_page_desc ) echo "<div class=\"options-page-description\">$this->options_page_desc</div>"; ?>
			<?php do_action( "$this->option_name-before-options-form" ); ?>
			
			<form action="options.php" method="post">
				
				<?php 
				
				do_action( "$this->option_name-options-form-add-fields" );
				settings_fields( $this->option_group );
				wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
				wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); 
				
				?>
				
				<!-- Load page Blocks -->
				<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
					
					<!-- Main Body -->
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">
							<?php 
							
							do_meta_boxes( $this->pagehook, 'normal', false );
							do_meta_boxes( $this->pagehook, 'additional', false ); 
						
							?>
							
							<p>
								<input type="submit" value="Save Changes" class="button-primary" name="Submit"/>
							</p>
							
							<div class="clear"/></div>
						</div>
					</div>
					
					<div class="clear"/></div>
				</div>	
				
			</form>
			
			<?php do_action( "$this->option_name-after-options-form" ); ?>
			
		</div>
		
		<script type="text/javascript">
			//<![CDATA[
			jQuery(document).ready( function($) {
				// close postboxes that should be closed
				$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
				// postboxes setup
				postboxes.add_postbox_toggles('<?php echo $this->pagehook; ?>');
			});
			//]]>
		</script>
		
		<?php
		
	} // end function on_show_page
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Admin: Conditionals
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * have_new_options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_new_options() {
		
		if ( isset( $this->new_options ) AND is_array( $this->new_options ) AND ! empty( $this->new_options ) ) {
			$this->set( 'have_new_options', 1 );
		} else {
			$this->set( 'have_new_options', 0 );
		}
		
		return $this->have_new_options;
		
	} // end function have_new_options 
	
	
	
	
	
	
	/**
	 * have_existing_options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_existing_options() {
		
		if ( isset( $this->existing_options ) AND is_array( $this->existing_options ) ) {
			$this->set( 'have_existing_options', 1 );
		} else {
			$this->set( 'have_existing_options', 0 );
		}
		
		return $this->have_existing_options;
		
	} // end function have_existing_options 
	
	
	
	
	
	
	/**
	 * have_raw_option_block__settings
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_raw_option_block__settings() {
		
		if ( isset( $this->raw_options[$this->option_block_id]['settings'] ) AND is_array( $this->raw_options[$this->option_block_id]['settings'] ) AND ! empty( $this->raw_options[$this->option_block_id]['settings'] ) ) {
			$this->set( 'have_raw_option_block__settings', 1 );
		} else {
			$this->set( 'have_raw_option_block__settings', 0 );
		}
		
		return $this->have_raw_option_block__settings;
		
	} // end function have_raw_option_block__settings 
	
	
	
	
	
	
	/**
	 * have_raw_option_block__meta_box
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_raw_option_block__meta_box() {
		
		if ( isset( $this->raw_options[$this->option_block_id]['meta_box'] ) AND is_array( $this->raw_options[$this->option_block_id]['meta_box'] ) AND ! empty( $this->raw_options[$this->option_block_id]['meta_box'] ) ) {
			$this->set( 'have_raw_option_block__meta_box', 1 );
		} else {
			$this->set( 'have_raw_option_block__meta_box', 0 );
		}
		
		return $this->have_raw_option_block__meta_box;
		
	} // end function have_raw_option_block__meta_box
	
	
	
	
	
	
	/**
	 * have_raw_option_block__meta_box__title
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_raw_option_block__meta_box__title() {
		
		if ( $this->have_raw_option_block__meta_box() AND isset( $this->raw_options[$this->option_block_id]['meta_box']['title'] ) AND ! empty( $this->raw_options[$this->option_block_id]['meta_box']['title'] ) ) {
			$this->set( 'have_raw_option_block__meta_box__title', 1 );
		} else {
			$this->set( 'have_raw_option_block__meta_box__title', 0 );
		}
		
		return $this->have_raw_option_block__meta_box__title;
		
	} // end function have_raw_option_block__meta_box__title
	
	
	
} // end class OptionPageWPMC