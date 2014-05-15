<?php
/**
 * File Name PBWebToProspectWidgetWP.php
 * @package WordPress
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################





/**
 * PBWebToProspectWidgetWP
 *
 * @version 1.0
 * @updated 00.00.00
 **/
class PBWebToProspectWidgetWP extends WP_Widget {
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function __construct() {
		
		$this->set( 'name', __( 'Property Base Web to Prospect', 'pbwtp' ) );
		$this->set( 'id', 'property-base-web-to-prospect' );
		
		$this->set( 'control_ops', array(
			// 'width' => 400,
			// 'height' => 350,
			'id_base' => $this->id
			) );
		
		$this->set( 'widget_ops', array(
			'classname' => $this->id,
			'description' => __( 'Add your Property Base form to your widgetized areas.', 'pbwtp' )
			) );
		
		
		$this->WP_Widget( $this->id, $this->name, $this->widget_ops, $this->control_ops );

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
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Widget 
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function widget( $args, $instance ) {
		// $args
		// $instance
		
		echo $args['before_widget'];
			
			echo PBaseWebToProspectForm::get_display($args);
			
		echo $args['after_widget'];
		
	} // end function widget
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Admin
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Update Widget data
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['value'] = $new_instance['value'];
		
		return $instance;
	
	} // end function update
	
	
	
	
	
	
	/**
	 * Widget Form
	 *
	 * @version 1.1
	 * @updated 07.16.13
	 **/
	/*function form( $instance ) {
		
		//Defaults
		$defaults = array(
			'defaults' => __( 'Text', 'pbwtp' ),
			);
		
		$r = wp_parse_args( $instance, $defaults );
		extract( $r, EXTR_SKIP );
		
		
		// Get pages
		$pages = get_pages();
		
		
		?>
		<!-- Text Title
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Text Title:', 'pbwtp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('text_title'); ?>" type="text" value="<?php echo $text_title; ?>" />
		</p>
		-->
		<?php
	
	
	} // end function form*/
	
	
	
} // end class PBWebToProspectWidgetWP