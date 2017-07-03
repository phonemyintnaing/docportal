$(document).ready(function() {	

	$(".submit").click(function() {	
		var userid = $(this).attr("id"); 
		//alert(userid);
		
		var action = "update_user.php";
		var form_data = {
			userid: userid,
			blood_presure: blood_presure,
			is_ajax: 1
			
		};
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'OK') {	
						alert(1);
				} else {
						alert(0);
				}
			}
		});		
		return false;
	});
		
});

