var user = { 
	/*
	 * User delete process
	 */
	userDelete: function(url,id){
			self =$(this);
			
			if(confirm('Are you sure you want to delete this user?')){
				$.ajax({
					url: url,
					data: 'user_id='+id,
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

/**
 *  Function bind action to show drop down of main menu
 */
$(function() {
 //We initially hide the all dropdown menus
 $('#dropdown_navigator li').find('.sub_navigator').hide();
 
 //When hovering over the main nav link we find the dropdown menu to the corresponding link.
 $('#dropdown_navigator li').hover(function() {
	  //Find a child of 'this' with a class of .sub_navigator and make the beauty fadeIn.
	  $(this).find('.sub_navigator').fadeIn(100);
	 }, function() {
	  //Do the same again, only fadeOut this time.
	  $(this).find('.sub_navigator').fadeOut(50);
 });
});