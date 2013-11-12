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