$(document).ready(function() {
	$('#LOGINB').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'LOGIN.php',
            data: {
				userid: $("#userid").val(),
				pwd: $("#pwd").val()
			},
			success: function(response){
				if(response == '1'){
					window.location.replace("ADMIN.php");
				}
				else if(response == '2'){
					window.location.replace("USER.php");
				}
				else if(response == '0'){
					$("#err").empty();
					$("#err").append("Invalid Username/Password!! Please Try Again!!");
				}
				else if(response == '3'){
					$("#err").empty();
					$("#err").append("Username and Password are Empty!! Please Try Again!!");
				}
				else if(response == '4'){
					$("#err").empty();
					$("#err").append("Username is Empty!! Please Try Again!!");
				}
				else if(response == '5'){
					$("#err").empty();
					$("#err").append("Password is Empty!! Please Try Again!!");
				}
			}
        });

    });
	
	$('#CAB').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'CREATE.php',
            data: {
				userid: $("#userid").val(),
				pwd: $("#pwd").val()
			},
			success: function(response){
				if(response == '0'){
					$("#err").empty();
					$("#err").append("User exists already!! Please Try a different Username!!");
				}
				else if(response == '1'){
					$("#err").empty();
					$("#err").append("Account has been Successfully Created!!");
				}
				else if(response == '2'){
					$("#err").empty();
					$("#err").append("Username and Password are Empty!! Please Try Again!!");
				}
				else if(response == '3'){
					$("#err").empty();
					$("#err").append("Username is Empty!! Please Try Again!!");
				}
				else if(response == '4'){
					$("#err").empty();
					$("#err").append("Password is Empty!! Please Try Again!!");
				}
				else if(response == '5'){
					$("#err").empty();
					$("#err").append("Password is Weak, should contain 1 uppercase, 1 lowercase, 1 number and minimum length should be 5!!");
				}
			}
        });
    });
});