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
						$('#flash_notice').html(data);
					},
					error: function(data){
						alert("There is an error while deleting.");
						console.log(data);
					}
				});
			}
	}	

}