var pbase = {
	
	
	
	localize : pbaseAdmin
	,displayVersion : function() {
		
		if ( pbase.localize.pbase.version == '2' ) {
			jQuery('#pbasev2, #settings, #form').fadeIn(300);
		} else if ( pbase.localize.pbase.version == '3' ) {
			jQuery('#pbasev3, #settings, #form').fadeIn(300);
		}
		
		jQuery('#version').change(function() {
			switch ( jQuery(this).val() ) {
				case '2' :
					jQuery('#pbasev2').fadeIn(300);
					jQuery('#pbasev3').hide();
					jQuery('#settings, #form').fadeIn(300);
					break;
				case '3' :
					jQuery('#pbasev3').fadeIn(300);
					jQuery('#pbasev2').hide();
					jQuery('#settings, #form').fadeIn(300);
					break;
				default : 
					jQuery('#pbasev2, #pbasev3, #settings, #form').hide();
					break;
			}
		});
		
	} // end displayVersion : function
	
	
	
}; // var pbase
jQuery(document).ready(function() {
	pbase.displayVersion();
});