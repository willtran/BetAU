var user = { 
	/*
	 * User delete process
	 */
	userDelete: function(url,id){
			self =$(this);
			
			if(confirm('Are you sure you want to delete this user?')){
				$.ajax({
					url: url,
					type: 'DELETE',
					success: function(data){
						$('#user_'+id).remove();
						$('#page_alert').html('<div id="flash_notice">'+data+'</div>');
					},
					error: function(data){
						alert("There is an error while deleting.");
						console.log(data);
					}
				});
			}
	}	
}

var category = { 
	/*
	 * User delete process
	 */
	categoryDelete: function(url,id){
			self =$(this);
			
			if(confirm('Are you sure you want to delete this category? This will unset all domain which are currently set to this domain.')){
				$.ajax({
					url: url,
					type: 'DELETE',
					success: function(data){
						$('#cat_'+id).remove();
						$('#page_alert').html('<div id="flash_notice">'+data+'</div>');
					},
					error: function(data){
						alert("There is an error while deleting.");
						console.log(data);
					}
				});
			}
	}	
}

var layout = {
	/*
	 * Show/Hide layout edit when change the value layout type
	 */
	updateLayoutEdit: function(){
		 // Disable all layout
		 $('#layout_edit_form').find('.layout_header_block').hide();
		 $('#layout_edit_form').find('.layout_footer_block').hide();
		 $('#layout_edit_form').find('.layout_home_block').hide();
		 $('#layout_edit_form').find('.layout_article_block').hide();
		 // Show current selected layout edit fields
		 var layout = $('#layout_type').val();
		 $('#layout_edit_form').find('.layout_'+layout+'_block').fadeIn(400);
	}
}

$(function() {
 //We initially hide the all layout edit
 $('#layout_edit_form').find('.layout_header_block').hide();
 $('#layout_edit_form').find('.layout_footer_block').hide();
 $('#layout_edit_form').find('.layout_home_block').hide();
 $('#layout_edit_form').find('.layout_article_block').hide();
 
 // Show current selected layout edit fields
 var layout = $('#layout_type').val();
 $('#layout_edit_form').find('.layout_'+layout+'_block').show();
});