<?php
/**
 * File Name FormFieldsWPMC.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.3.x
 * @updated 10.02.13
 **/
####################################################################################################





/**
 * FormFieldsWPMC
 *
 * @version 1.0
 * @updated 00.00.13
 **/
class FormFieldsWPMC {
	
	
	
	/**
	 * nonce_name
	 * 
	 * @access public
	 * @var string
	 **/
	var $nonce_name = 'vc-admin-ajax';
	
	
	
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
	 * name
	 * 
	 * @access public
	 * @var string
	 **/
	var $name = null;
	
	
	
	/**
	 * have_name
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_name = 0;
	
	
	
	/**
	 * val
	 * 
	 * @access public
	 * @var mix
	 **/
	var $val = 0;
	
	
	
	/**
	 * have_val
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_val = 0;
	
	
	
	/**
	 * id
	 * 
	 * @access public
	 * @var string
	 **/
	var $id = '';
	
	
	
	/**
	 * class
	 * 
	 * @access public
	 * @var string
	 **/
	var $class = '';
	
	
	
	/**
	 * desc
	 * 
	 * @access public
	 * @var string
	 **/
	var $desc = '';
	
	
	
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
	 * action
	 * 
	 * @access public
	 * @var string
	 **/
	var $action = null;
	
	
	
	/**
	 * have_action
	 * 
	 * @access public
	 * @var bool
	 **/
	var $have_action = 0;
	
	
	
	/**
	 * args
	 * 
	 * @access public
	 * @var array
	 **/
	var $args = array();
	
	
	
	/**
	 * have_args
	 * 
	 * @access public
	 * @var array
	 **/
	var $have_args = 0;
	
	
	
	/**
	 * output
	 * 
	 * @access public
	 * @var string
	 **/
	var $output = null;
	
	
	
	/**
	 * button_text
	 * 
	 * @access public
	 * @var string
	 **/
	var $button_text = 'Select';
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {

		// nothing

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
	 * set__default_val
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__default_val() {
		
		if ( $this->have_args() AND isset( $args['val'] ) AND ! empty( $args['val'] ) ) {
			$this->val = $args['val'];
		}
		
	} // end function set__default_val 
	
	
	
	
	
	
	/**
	 * set__id
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__id( $id ) {
		
		if ( isset( $id ) AND ! empty( $id ) ) {
			$this->set( 'id', $id );
		} else {
			$this->set( 'id', "id-$this->name" );
		}
		
	} // end function set__id
	
	
	
	
	
	
	/**
	 * get__description_text
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function get__description_text( $html = true ) {
		
		if ( $this->have_desc() ) {
			
			if ( $html == true ) {
				$output = "<p class=\"description $this->class\">$this->desc</p>";
			} else {
				$output = $this->desc;
			}
			
		} else {
			$output = false;
		}
		
		return $output;
		
	} // end function get__description_text 
	
	
	
	
	
	
	/**
	 * set__minlength
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__minlength() {
		
		if ( isset( $this->args['minlength'] ) AND is_numeric( $this->args['minlength'] ) AND $this->args['minlength'] > 1 ) {
			$output = " minlength=\"" . $this->args['minlength'] . "\"";
		} else {
			$output = false;
		}
		
		return $output;
		
	} // end function set__minlength 
	
	
	
	
	
	
	/**
	 * set__button_text
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set__button_text( $alt_text = false ) {
		
		if ( $this->have_options() AND isset( $this->option['button_text'] ) AND ! empty( $this->option['button_text'] ) ) {
			$this->set( 'button_text', $this->option['button_text'] );
		} else if ( $alt_text != false ) {
			$this->set( 'button_text', $alt_text );
		}
		
	} // end function set__button_text
	
	
	
	
	
	
	/** 
	 * append_leading_zero
	 *
	 * @version 1.1
	 * @updated 10.02.13
	 **/
	function append_leading_zero( $num ) {

		if ( ( strlen( $num ) < 2 ) AND $num <= 9 AND $num >= 0 ) {
			return "0$num";
		} else {
			return $num;
		}

	} // end function append_leading_zero
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * field
	 * 
	 * @version 1.7
	 * @updated 07.19.13
	 **/
	function field( $type, $name, $val, $id = false, $class = false, $desc = false, $options = false, $action = false, $args = false ) {
		
		$this->set( 'type', $type );
		$this->set( 'name', $name );
		
		if ( $this->have_type() AND $this->have_name() ) {
			
			$this->set( 'val', $val );
			$this->set__id( $id );
			$this->set( 'class', $class );
			$this->set( 'desc', $desc );
			$this->set( 'options', $options );
			$this->set( 'action', $action );
			$this->set( 'args', $args );
			
			$this->set__default_val();
			
			/**
			 * Note:
			 * "echo" is used due to wp_editor()
			 * wp_editor() function is not able to be returned
			 **/ 
			
			switch ( $this->type ) {
				
				case "text_explain" :
				case "paragraph-text" :
					echo $this->get__description_text();
					break;
				case "text" :
					echo $this->field__text();					
					break;
				case "password" :
					echo $this->field__password();
					break;
				case "text_multi" :
					echo $this->field__text_multi();
					break;
				case "button" :
					echo $this->field__button();
					break;
				case "hidden" :
					echo $this->field__hidden();
					break;
				case "text_editor" :
					// This method wil echo itself due to the wp_editor() function
					$this->field__text_editor();
					break;
				case "simple_text_editor" :
					// This method wil echo itself due to the wp_editor() function
					$this->field__simple_text_editor();
					break;
				case "textarea" :
					echo $this->field__textarea();
					break;
				case "checkbox" :
					// This method wil echo itself due to the checked() function
					$this->field__checkbox();
					break;
				case "multi_checkbox" :
					// This method wil echo itself due to the checked() function
					$this->field__multi_checkbox();
					break;
				case "radio" :
					// This method wil echo itself due to the checked() function
					$this->field__radio();
					break;
				case "select" :
					echo $this->field__select();
					break;
				case "select_page" :
					echo $this->field__select_page();
					break;
				case "upload" :					
					echo $this->field__upload();
					break;
				case "image" :
					echo $this->field__upload_image();
					break;
				case "image_multi" :
					echo $this->field__upload_image_multi();
					break;
				case "custom_menu" :
					echo $this->field__custom_menu();
					break;
				case "select_post" :
					echo $this->field__select_post();
					break;
				case "select_post_type" :
					echo $this->field__select_post_type();
					break;
				case "select_post_status" :
					echo $this->field__select_post_status();
					break;
				case "select_comment_status" :
					echo $this->field__select_comment_status();
					break;
				case "select_post_author" :
					echo $this->field__select_post_author();
					break;
				case "featured_image" :
					// This method wil echo itself due to the Featured_Images_Post_Type_VC class
					$this->field__featured_image();
					break;
				case "select_cform" :
					echo $this->field__select_cform();
					break;
				case "select_terms" :
					echo $this->field__select_terms();
					break;
				case "date" :
					echo $this->field__date();
					break;
				default :
					
					if ( $this->have_action() ) {
						do_action( $this->action, array( 'type' => $this->type, 'name' => $this->name, 'val' => $this->val, 'id' => $this->id, 'class' => $this->class, 'desc' => $this->desc, 'options' => $this->options ), $this->args );
					}
					break;

			} // end switch ( $type )
			
		} // end if ( $this->have_type() AND $this->have_name() )

	} // end function field
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Conditionals
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
			$this->set( 'have_type', 0 );
		}
		
		return $this->have_type;
		
	} // end function have_type 
	
	
	
	
	
	
	/**
	 * have_name
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_name() {
		
		if ( isset( $this->name ) AND ! empty( $this->name ) ) {
			$this->set( 'have_name', 1 );
		} else {
			$this->set( 'have_name', 0 );
		}
		
		return $this->have_name;
		
	} // end function have_name 
	
	
	
	
	
	
	/**
	 * have_desc
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_desc() {
		
		if ( isset( $this->desc ) AND ! empty( $this->desc ) ) {
			$this->set( 'have_desc', 1 );
		} else {
			$this->set( 'have_desc', 0 );
		}
		
		return $this->have_desc;
		
	} // end function have_desc 
	
	
	
	
	
	
	/**
	 * have_options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_options() {
		
		if ( isset( $this->options ) AND ! empty( $this->options ) ) {
			$this->set( 'have_options', 1 );
		} else {
			$this->set( 'have_options', 0 );
		}
		
		return $this->have_options;
		
	} // end function have_options
	
	
	
	
	
	
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
			$this->set( 'have_args', 0 );
		}
		
		return $this->have_args;
		
	} // end function have_args
	
	
	
	
	
	
	/**
	 * have_val
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_val() {
		
		if ( isset( $this->val ) AND ! empty( $this->val ) ) {
			$this->set( 'have_val', 1 );
		} else {
			$this->set( 'have_val', 0 );
		}
		
		return $this->have_val;
		
	} // end function have_val 
	
	
	
	
	
	
	/**
	 * have_action
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function have_action() {
		
		if ( isset( $this->action ) AND ! empty( $this->action ) ) {
			$this->set( 'have_action', 1 );
		} else {
			$this->set( 'have_action', 0 );
		}
		
		return $this->have_action;
		
	} // end function have_action
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Fields
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * field__text
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__text() {
		
		if ( is_array( $this->val ) ) {
			$this->val = false;
		}
		
		$output = "<input type=\"text\" name=\"$this->name\" value=\"$this->val\" id=\"$this->id\" class=\"large-text $this->class\"";
			
			if ( $minlength = $this->set__minlength() ) {
				$output .= $minlength;
			}
		
		$output .= ">";
		
		$output .= $this->get__description_text();
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__text 
	
	
	
	
	
	
	/**
	 * field__password
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__password() {
		
		$output = "<input type=\"password\" name=\"$this->name\" value=\"$this->val\" id=\"$this->id\" class=\"large-text $this->class\">";
		$output .= $this->get__description_text();
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__password 
	
	
	
	
	
	
	/**
	 * field__text_multi
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__text_multi() {
		
		if ( isset( $this->args['count'] ) AND is_numeric( $this->args['count'] ) ) {
			$count = $this->args['count'] - 1;
			
			$output = $this->get__description_text();
			
			$output .= "<div class=\"vc-sortable-wrap\"><ul id=\"text-multi-$this->name\" class=\"text-multi multi-sortable\" data-save_name=\"$this->name\" data-switch-case=\"sortable-metadata\" data-nonce=\"" . wp_create_nonce( 'vc-admin-ajax' ) . "\">";
			
			for ( $i = 0; $i <= $count; $i++ ) {
				if ( isset( $this->val[$i] ) AND ! empty( $this->val[$i] ) ) {
					$val = $this->val[$i];
				} else {
					$val = '';
				}
				$output .= "<li id=\"$this->name-sort-$i\"><span class=\"sort-handle\"></span><input type=\"text\" name=\"" . $this->name . "[]\" value=\"" . $val . "\" id=\"$this->name-$i\" class=\"large-text $this->class\"></li>";
			}
			
			$output .= "</ul></div>";
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__text_multi 
	
	
	
	
	
	
	/**
	 * field__button
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__button() {
		
		if ( $this->have_options() AND isset( $this->options['button_val'] ) AND ! empty( $this->options['button_val'] ) ) {
			
			$output = "<p>";
			$output .= "<input class=\"button\" type=\"button\" name=\"$this->name\" value=\"" . $this->options['button_val'] . "\"";

				if ( isset( $this->options['data_attr'] ) AND is_array( $this->options['data_attr'] ) AND ! empty( $this->options['data_attr'] ) ) {
					foreach ( $this->options['data_attr'] as $key => $attr ) {
						$output .= "data-$key=\"$attr\" ";
					}
				}

			$output .= "/> ";

			$output .= $this->get__description_text( false );

			$output .= "</p>";
			
		} else {
			$output = false;
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__button
	
	
	
	
	
	
	/**
	 * field__hidden
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__hidden() {
		
		$output = "<input type=\"hidden\" name=\"$this->name\" value=\"$this->val\" id=\"$this->id\">";
		
		$output .= $this->get__description_text();
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__hidden 
	
	
	
	
	
	
	/**
	 * field__text_editor
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__text_editor() {
		
		if ( $this->have_options() ) {
			$this->options['textarea_name'] = $this->name;			
		}
		
		wp_editor( $this->val, $this->name, $this->options );
		
		echo $this->get__description_text();
		
	} // end function field__text_editor 
	
	
	
	
	
	
	/**
	 * field__simple_text_editor
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__simple_text_editor() {
		
		wp_editor( $this->val, sanitize_title_with_dashes($this->name), array(
			'textarea_name' => $this->name,
			'textarea_rows' => 8,
			'media_buttons' => false,
			'tinymce' => true, // Disables actual TinyMCE buttons // This makes the rich content editor
			'quicktags' => true // Use QuickTags for formatting    // work within a metabox.
			) );
		
		echo $this->get__description_text();
		
	} // end function field__simple_text_editor 
	
	
	
	
	
	
	/**
	 * field__textarea
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__textarea() {
		
		$output = "<textarea style=\"height:250px;\" name=\"$this->name\" id=\"$this->id\" class=\"large-text\">$this->val</textarea>";
		$output .= $this->get__description_text();
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__textarea 
	
	
	
	
	
	
	/**
	 * field__checkbox
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__checkbox() {
		
		echo "<p><input type=\"checkbox\" name=\"$this->name\" id=\"$this->id\" class=\"\" "; checked( $this->val, 'on' ); echo ">";
		if ( $this->have_desc() ) {
			echo "&nbsp;&nbsp;&nbsp;<span class=\"description\">" . $this->get__description_text(false) . "</span>";
		}
 		echo "</p>";
		
	} // end function field__checkbox 
	
	
	
	
	
	
	/**
	 * field__multi_checkbox
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__multi_checkbox() {
		
		if ( $this->have_options() ) { 
			$i = 0;
			
			foreach ( $this->options as $key => $val ) {
				$i++;
				
				if ( is_array( $this->val ) AND in_array( $val, $this->val ) ) {
					$is_checked = true;
				} else {
					$is_checked = false;
				}
				
				echo "<input style=\"width:auto !important\" type=\"checkbox\" name=\"" . $this->name . "[$key]\" id=\"$this->id-$i\" value=\"$val\" class=\"\" "; checked( $is_checked, true ); echo ">&nbsp;$val<br />";
			}
		}
		
		echo $this->get__description_text();
		
	} // end function field__multi_checkbox 
	
	
	
	
	
	
	/**
	 * field__radio
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__radio() {
		
		if ( $this->have_options() ) { 
			$i = 0;
			foreach ( $this->options as $key => $val ) {
				$i++;
				echo "<input type=\"radio\" name=\"$this->name\" id=\"$this->id-$i\" class=\"$this->class\" value=\"$key\" "; checked( $this->val, $key ); echo ">&nbsp;$val<br />";	
			}
		}
		
		echo $this->get__description_text();
		
	} // end function field__radio 
	
	
	
	
	
	
	/**
	 * field__select
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select() {
		
		if ( $this->have_options() ) { 
			
			$output = "<select id=\"$this->id\" name=\"$this->name\">";

				foreach ( $this->options as $key => $val ) {

					if ( $val == $this->val )
						$sel = 'selected="selected"';
					else
						$sel = '';
					$output .= "<option $sel value=\"$val\">$key</option>";
				}

			$output .= "</select>";
			
		}
		
		$output .= $this->get__description_text();
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select
	
	
	
	
	
	
	/**
	 * field__select_page
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_page() {
		
		$pages = get_pages();
		
		if ( is_array( $pages ) AND ! empty( $pages ) ) {
			
			$output = "<select id=\"$this->id\" name=\"$this->name\">";
				$output .= "<option value=\"\">Select a Page</option>";

				foreach ( $pages as $page ) {

					if ( $page->ID == $this->val )
						$sel = 'selected="selected"';
					else
						$sel = '';

					$output .= "<option $sel value=\"$page->ID\">" . $page->post_title . "</option>";

				}

			$output .= "</select>";
			
			$output .= $this->get__description_text();
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_page 
	
	
	
	
	
	
	/**
	 * field__upload
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__upload() {
		
		if ( ! $this->have_val() AND isset( $this->args['defalut_file'] ) AND ! empty( $this->args['defalut_file'] ) ) {
			$this->set( 'val', $this->args['defalut_file'] );
		}

		$formfield = sanitize_title_with_dashes( $this->id ) . "-upload";
        $this->set__button_text( "Add a File" );

		$output = "<input type=\"text\" id=\"$formfield\" name=\"$this->name\" value=\"$this->val\" class=\"media-upload-vc\" />";
		$output .= "<input type=\"button\" value=\"$this->button_text\" data-formfield=\"$formfield\" class=\"button media-upload-button-vc\" style=\"width:auto !important; display:inline-block !important;\" />";
		
		$output .= $this->get__description_text();
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__upload
	
	
	
	
	
	
	/**
	 * field__upload_image
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__upload_image() {
		
		if ( ! $this->have_val() AND isset( $this->args['defalut_image'] ) AND ! empty( $this->args['defalut_image'] ) ) {
			$this->set( 'val', $this->args['defalut_image'] );
		}

		$formfield = sanitize_title_with_dashes( $this->id ) . "-image";
        $this->set__button_text( "Add an Image" );

		$output = "<input type=\"text\" id=\"$formfield\" name=\"$this->name\" value=\"$this->val\" class=\"media-upload-vc large-text\" />";
		$output .= "<input type=\"button\" value=\"$this->button_text\" data-formfield=\"$formfield\" class=\"button media-upload-button-vc\" style=\"width:auto !important; display:inline-block !important;\" />";
		
		$output .= $this->get__description_text();		
		
		$output .= "<p class=\"description $formfield\">";
		if ( $this->have_val() ) {			
			$output .= "<img src=\"$this->val\" alt=\"\" style=\"max-height:150px;width:auto;\" />";
		}
		$output .= "</p>";
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__upload_image 
	
	
	
	
	
	
	/**
	 * field__upload_image_multi
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__upload_image_multi() {
		
		if ( $this->have_options() AND isset( $this->args['count'] ) AND is_numeric( $this->args['count'] ) AND ! empty( $this->args['count'] ) ) {
			$this->set( 'count', $this->args['count'] );
			$this->count = $this->count - 1;
			
			$output = $this->get__description_text();
			
			$output .= "<div class=\"vc-sortable-wrap\">";
				$output .=  "<ul id=\"image-multi-$this->name\" class=\"image-multi multi-sortable\" data-save_name=\"$this->name\" data-switch-case=\"sortable-metadata\" data-nonce=\"" . wp_create_nonce( $this->nonce_name ) . "\">";
					
					for ( $i = 0; $i <= $count; $i++ ) {
						
						$output .= "<li id=\"$this->name-sort-$i\">";
							$output .= "<span class=\"sort-handle\"></span>";
							
							$formfield = sanitize_title_with_dashes( $this->id ) . "-image";
							$this->set__button_text( "Add a File" );

							$output .= "<input type=\"text\" id=\"$formfield-$i\" class=\"media-upload-vc\" name=\"" . $this->name . "[]\" value=\"" . $this->val[$i] . "\" />";
							$output .= "<input type=\"button\" value=\"$this->button_text\" data-formfield=\"$formfield-$i\" class=\"button media-upload-button-vc\" style=\"width:auto !important; display:inline-block !important;\" />";

							
							$output .= "<p class=\"description $formfield-$i\">";
							if ( isset( $val[$i] ) AND ! empty( $val[$i] ) ) {
								$output .= "<img src=\"" . $val[$i] . "\" alt=\"\" style=\"max-height:150px;width:auto;\" />";
							}
							$output .= "</p>";

						$output .= "</li>";
						
					} // end for ( $i = 0; $i <= $count; $i++ )
					
				$output .= "</ul>";
			$output .= "</div>";
			
		} // end if ( $this->have_options() AND ... )
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__upload_image_multi 
	
	
	
	
	
	
	/**
	 * field__custom_menu
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__custom_menu() {
		
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		// If no menus exists, direct the user to go and create some.
		if ( isset( $menus ) AND $menus != false ) {
			
			$output = '<p class="description">'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			
		} else {
			
			if ( is_array( $menus ) AND ! empty( $menus ) ) {
				$output = "<select id=\"$this->id\" name=\"$this->name\">";
					$output .= "<option value=\"\">Select a Menu</option>";

					foreach ( $menus as $menu ) {

						if ( $menu->term_id == $this->val )
							$sel = 'selected="selected"';
						else
							$sel = '';

						$output .= "<option $sel value=\"$menu->term_id\">$menu->name</option>";

					}

				$output .= "</select>";

				$output .= $this->get__description_text();
			}
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__custom_menu 
	
	
	
	
	
	
	/**
	 * field__select_post_type
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_post_type() {
		
		$post_types = get_post_types( array( 'public' => true ) );
		unset( $post_types['attachment'] );

		$post_types = apply_filters( 'form_fields_vc-select_post_type', $post_types );
		
		if ( is_array( $post_types ) AND ! empty( $post_types ) ) {
			
			$output = "<select id=\"$this->id\" name=\"$this->name\">";
				$output .= "<option value=\"\">Select a Post Type</option>";

				foreach ( $post_types as $post_type ) {

					$post_type_object = get_post_type_object( $post_type );

					if ( $post_type == $this->val )
						$sel = 'selected="selected"';
					else
						$sel = '';

					$output .= "<option $sel value=\"$post_type\">" . $post_type_object->labels->singular_name . "</option>";

				}

			$output .= "</select>";
			
			$output .= $this->get__description_text();
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_post_type 
	
	
	
	
	
	
	/**
	 * field__select_post
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_post() {
		
		if ( $this->have_options() AND isset( $this->options['post_type'] ) AND post_type_exists( $this->options['post_type'] ) ) {
			// global $wp_query, $post;
			
			$posts = new WP_Query();
			$posts->query( array(
				'posts_per_page' => -1,
				'post_type' => $this->options['post_type'],
				'post_status' => 'any'
			) );
			
			$output = '';
			
			if ( $posts->have_posts() ) {
				
				$output .= "<select id=\"$this->id\" name=\"$this->name\">";
					$output .= "<option value=\"\">Make a selection</option>";
				
					while ( $posts->have_posts() ) {
						$posts->the_post();

						if ( $posts->post->ID == $this->val )
							$sel = 'selected="selected"';
						else
							$sel = '';

						$output .= "<option $sel value=\"" . $posts->post->ID . "\">" . esc_attr( strip_tags( $posts->post->post_title ) ) . "</option>";

					} // end while ( have_posts() )
					
					$output .= "</select>";

					$output .= $this->get__description_text();
					
			} else {
				
				$output .= "<p>No selections available. <a href=\"" . home_url() . "/wp-admin/post-new.php?post_type=" . $this->options['post_type'] . "\">Add New &raquo;</a></p>";
				$output .= $this->get__description_text();
				
			}
			wp_reset_postdata();
			wp_reset_query();
			
		} // end if ( $this->have_options() )
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_post
	
	
	
	
	
	
	/**
	 * field__select_post_status
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_post_status() {
		
		$post_statuses = apply_filters( 'form_fields_vc-select_post_status', array( 'Publish' => 'publish', 'Draft' => 'draft', 'Private' => 'private' ) );
        
		if ( is_array( $post_statuses ) AND ! empty( $post_statuses ) ) {
			
			$output = "<select id=\"$this->id\" name=\"$this->name\">";
				$output .= "<option value=\"\">Select a Post Status</option>";

				foreach ( $post_statuses as $key => $post_status ) {

					if ( $post_status == $this->val )
						$sel = 'selected="selected"';
					else
						$sel = '';

					$output .= "<option $sel value=\"$post_status\">$key</option>";

				}

			$output .= "</select>";
			
			$output .= $this->get__description_text();
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_post_status 
	
	
	
	
	
	
	/**
	 * field__select_comment_status
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_comment_status() {
		
		$comment_statuses = apply_filters( 'form_fields_vc-select_comment_status', array( 'Open' => 'open', 'Closed' => 'closed' ) );
		
		if ( is_array( $comment_statuses ) AND ! empty( $comment_statuses ) ) {
			
			$output = "<select id=\"$this->id\" name=\"$this->name\">";
				$output .= "<option value=\"\">Select a Comment Status</option>";

				foreach ( $comment_statuses as $key => $comment_status ) {

					if ( $comment_status == $this->val )
						$sel = 'selected="selected"';
					else
						$sel = '';

					$output .= "<option $sel value=\"$comment_status\">$key</option>";

				}

			$output .= "</select>";
			
			$output .= $this->get__description_text();
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_comment_status 
	
	
	
	
	
	
	/**
	 * field__select_post_author
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_post_author() {
		
		$get_user_args = apply_filters( 'form_fields_vc-select_post_author-args', array() );
		$users = get_users( $get_user_args );
		
		if ( is_array( $users ) AND ! empty( $users ) ) {
			
			$output = "<select id=\"$this->id\" name=\"$this->name\">";
				$output .= "<option value=\"\">Select an Author</option>";

				foreach ( $users as $user ) {

					if ( user_can( $user->ID, 'delete_posts' ) ) {

						if ( $user->ID == $this->val )
							$sel = 'selected="selected"';
						else
							$sel = '';

						$output .= "<option $sel value=\"$user->ID\">$user->display_name</option>";

					}

				}

			$output .= "</select>";

			$output .= $this->get__description_text();
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_post_author 
	
	
	
	
	
	
	/**
	 * field__featured_image
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__featured_image() {
		
		featured_image__form_select( array(
			'val' => $this->val,
			'id' => $this->id,
			'name' => $this->name,
			) );
			
		echo $this->get__description_text();
		
	} // end function field__featured_image
	
	
	
	
	
	
	/**
	 * field__select_cform
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_cform() {
		
		if ( function_exists( 'cforms_activate' ) ) {

			$cformsSettings = get_option('cforms_settings');
			$form_count = $cformsSettings['global']['cforms_formcount'];
			$options['Select A Form'] = '';
			for ( $i = 1; $i <= $form_count; $i++ ) {
				$j = ( $i > 1 ) ? $i : '';
				$key = stripslashes( $cformsSettings['form'.$j]['cforms'.$j.'_fname'] );				
				$options[$key] = $i;

			}
		
		}
			
		if ( is_array( $options ) AND ! empty( $options ) ) {
			
			$output = "<select id=\"$this->id\" name=\"$this->name\">";

				foreach ( $options as $key => $val ) {

					if ( $val == $this->val )
						$sel = 'selected="selected"';
					else
						$sel = '';

					$output .= "<option $sel value=\"$val\">$key</option>";

				}

			$output .= "</select>";

			$output .= $this->get__description_text();
			
		}
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_cform
	
	
	
	
	
	
	/**
	 * field__select_terms
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function field__select_terms() {
		
		if ( isset( $this->options['taxonomy'] ) AND ! empty( $this->options['taxonomy'] ) ) {
			
			$terms = get_terms( $this->options['taxonomy'] );

			if ( ! is_wp_error( $terms ) ) {

				$output = "<select id=\"$this->id\" name=\"$this->name\">";
					$output .= "<option value=\"\">Select a term</option>";
					
					foreach ( $terms as $term ) {
						
						$option_val = $term->slug;
						if ( isset( $this->options['select_by_id'] ) AND ! empty( $this->options['select_by_id'] ) AND $this->options['select_by_id'] == 1 ) {
							$option_val = $term->term_id;
						}

						if ( $option_val == $this->val )
							$sel = 'selected="selected"';
						else
							$sel = '';

						$output .= "<option $sel value=\"$option_val\">" . strip_tags( $term->name ) . "</option>";

					}

				$output .= "</select>";

				$output .= $this->get__description_text();

			}
			
		} // end if ( isset( $this->options['taxonomy'] ) AND ! empty( $this->options['taxonomy'] ) )
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__select_terms 
	
	
	
	
	
	
	/**
	 * field__date
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	/*function field__date() {
		
		$output .= "Month&nbsp;<select name=\"" . $this->name . "[m]\" value=\"" . $this->val['m'] . "\" id=\"" . $this->name . "_m\" style=\"width:50px;\">";
			$m = 1;
			if ( empty( $this->val['m'] ) )
				$this->val['m'] = date('m');
				
			while ( $m <= 12 ) {

				if ( $this->val['m'] == $m )
					$sel = 'selected="selected"';
				else
					$sel = '';

				$output .= "<option $sel value=\"$m\">$m</option>";
				$m++;
			}
		$output .= "</select>&nbsp;&nbsp;&nbsp;";
		
		$output .= "Day&nbsp;<select name=\"" . $this->name . "[d]\" value=\"" . $this->val['d'] . "\" id=\"" . $this->name . "_d\" style=\"width:50px;\">";
			$d = 1;
			if ( empty( $this->val['d'] ) )
				$this->val['d'] = date('d');
				
			while ( $d <= 31 ) {

				if ( $this->val['d'] == $d )
					$sel = 'selected="selected"';
				else
					$sel = '';

				$output .= "<option $sel value=\"$d\">$d</option>";
				$d++;
			}
		$output .= "</select>&nbsp;&nbsp;&nbsp;";
		
		$output .= "Year&nbsp;<select name=\"" . $this->name . "[Y]\" value=\"" . $this->val['Y'] . "\" id=\"" . $this->name . "_Y\" style=\"width:75px;\">";
			$Y = date('Y') - 1;
			if ( empty( $this->val['Y'] ) )
				$this->val['Y'] = date('Y');
				
			while ( $Y <= ( date('Y') + 1 ) ) {

				if ( $this->val['Y'] == $Y )
					$sel = 'selected="selected"';
				else
					$sel = '';

				$output .= "<option $sel value=\"$Y\">$Y</option>";
				$Y++;
			}
		$output .= "</select>&nbsp;&nbsp;&nbsp;";
		
        $output .= $this->get__description_text();
		
		$this->set( 'output', $output );
		
		return $this->output;
		
	} // end function field__date*/
	
	/**
	Add this to the sanitize class with a better case name than date, this is a string date not a real date
	case "year_month_day" :
		if ( !is_numeric( $new_option['d'] ) OR !is_numeric( $new_option['m'] ) OR !is_numeric( $new_option['Y'] ) ) {
			delete_post_meta( $_POST['ID'], '_year_month_day' );
			return false;
		} else {
			update_post_meta( $_POST['ID'], '_year_month_day', $new_option['Y'] . vc_leading_zero( $new_option['m'] ) . vc_leading_zero( $new_option['d'] ) );
		}
		
		break;
	**/
	
	
	
} // end class FormFieldsWPMC