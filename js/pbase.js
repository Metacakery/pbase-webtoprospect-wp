var pbase = {
	
	
	
	localize : PBWeb2P
	,target : null
	,init : function() {
		pbase.target = '#'+pbase.localize.html_wrapper_id_web2P;
		pbase.validate();
	}
	,validate : function() { 
		var form = jQuery(pbase.target + ' form[name="'+pbase.localize.html_wrapper_id_web2P+'"]');
		
		form.validate({
			submitHandler : function(form) {
				if ( pbase.localize.options.pbase.version == 3 ) {
					pbase.ajaxSubmit(form);
				} else {
					jQuery(form).submit();
				}
			}
			,invalidHandler: function(event, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1 ? 'You missed 1 field. It has been highlighted' : 'You missed ' + errors + ' fields. They have been highlighted';
					alert( message );
				}
			}
		});
	}
	,ajaxSubmit : function(form) {
		jQuery.post(
			pbase.localize.adminAjax
			,{
				action : pbase.localize.action
				,case : 'submit-web-to-prospect'
				,nonce : pbase.localize.nonce
				,post : jQuery(form).serialize()
			}
			,function(response) {
				if ( 'success' == response.status ) {
					jQuery(pbase.target + ' .msg').html('<p>'+pbase.localize.options.form.success_message+'</p>').addClass('success').fadeIn(300);
				} else if ( 'error' == response.status ) {
					jQuery(pbase.target + ' .msg').html('<p>'+response.html+'<br />'+pbase.localize.options.form.error_message+'</p>').addClass('error').fadeIn(300);
				}
				// console.log(response);
				
			}
			,'json'
		);
		
	} // end ajaxSubmit : function
	
	
	
}; // var pbase
jQuery(document).ready(function() {
	pbase.init();
});