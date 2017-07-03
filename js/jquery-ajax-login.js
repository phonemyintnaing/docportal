$(document).ready(function(){	
	$('#loginForm').submit(function(e) {
		login();
		e.preventDefault();		
	});	
});

function login(){

	$.ajax({
		type: "POST",
		url: "login.php",
		data: $('#loginForm').serialize(),
		dataType: "json",
		success: function(msgLogin){			
			if(parseInt(msgLogin.status)==1){
				window.location=msgLogin.txt;
			} else if(parseInt(msgLogin.status)==0){
				errorMsg(1,msgLogin.txt);
			}					
		} 
	});
}

function errorMsg(act,txt){	
	if(txt) $('#message').html(txt);
	$('#message').css( "display","block" );
}

