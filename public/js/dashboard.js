
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

var domains = { 
	/*
	 * Domain delete process
	 */
	domainDelete: function(url,id,name){
			self =$(this);
			
			if(confirm('Are you sure you want to delete domain "'+name+'"?')){
				$.ajax({
					url: url,
					type: 'DELETE',
					success: function(data){
						window.location.href = data;
					},
					error: function(data){
						alert("There is an error while deleting.");
						console.log(data);
					}
				});
			}
	}	
};

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
};

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
	},
	
	/*
	 * Layout delete process
	 */
	layoutDelete: function(url,id){
		self =$(this);
			
		if(confirm('Are you sure you want to delete this layout? This will unset all the categories that linked with this layout and cause some domains of those categories not to be able to access anymore.')){
			$.ajax({
				url: url,
				type: 'DELETE',
				success: function(data){
					$('#layout_'+id).remove();
					$('#page_alert').html('<div id="flash_notice">'+data+'</div>');
				},
				error: function(data){
					alert("There is an error while deleting.");
					console.log(data);
				}
			});
		}
	}
};

var article = {
	articleDelete: function(url,id){
		self = $(this);
		
		if(confirm('Are you sure you want to delete this article?')){
			$.ajax({
				url: url,
				type: 'DELETE',
				success: function(data){
					$('#article_'+id).remove();
					$('#page_alert').html('<div id="flash_notice">'+data+'</div>');
				},
				error: function(data){
					alert("There is an error while deleting.");
					console.log(data);
				}
			});
		}
	}
};

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

/* Top menu actions */
$(function() {
	 //We initially hide the all dropdown menus
	 $('#user_setting_block').find('#user_setting_sub_menu').hide();
	 
	 //When hovering over the main nav link we find the dropdown menu to the corresponding link.
	 $('#user_setting').hover(function() {
		  //Find a child of 'this' with a class of .sub_navigator and make the beauty fadeIn.
		  $('#user_setting_block').find('#user_setting_sub_menu').fadeIn(100);
		 });
		 
	$('#user_setting_sub_menu').hover(function() {
		  // Do nothing
	}, function(){
		//Do the same again, only fadeOut this time.
		  $('#user_setting_block').find('#user_setting_sub_menu').fadeOut(50);
	});
});
