$(document).ready(function() {
	
	$.ajax({
        type: 'POST',
        url: 'BROWSE.php',
        data: {},
		success: function(response){
			$("#bt").empty();
			$("#bt").append(response);
		}
    });
	
	$.ajax({
        type: 'POST',
        url: 'CART.php',
        data: {},
		success: function(response){
			$("#MINIBROWSE2").empty();
			$("#MINIBROWSE2").append(response);
		}
    });
	
	$.ajax({
        type: 'POST',
        url: 'HISTORY.php',
        data: {},
		success: function(response){
			$("#MINIBROWSE3").empty();
			$("#MINIBROWSE3").append(response);
		}
    });
	
	$('#LOGOUT').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'LOGOUT.php',
            data: {},
			success: function(response){
				window.location.replace("LOGIN.html");
			}
        });
    });
	
	$('#CHECKOUT').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'CHECKOUT.php',
            data: {},
			success: function(response){
				location.reload();
			}
        });
    });
	
	$('#SEARCH').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'FILTEREDBROWSE.php',
            data: {
				category: $("#CATEGORY").val(),
				itemname: $("#ITEMNAME").val()
			},
			success: function(response){
				$("#bt").empty();
				$("#bt").append(response);
			}
        });
    });
	
	$('#ADD-TO-CART').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ADDCART.php',
            data: {
				category: $("#CATEGORY").val(),
				itemname: $("#ITEMNAME").val()
			},
			success: function(response){
				if(response == '0'){
					$("#err1").empty();
					$("#err1").append("The Item you selected is not present or matches to multiple items!! Please select carefully!!");
				}
				else if(response == '2'){
					$("#err1").empty();
					$("#err1").append("The Item Fields are empty!!");
				}
				else if(response == '1'){
					location.reload();
				}
			}
        });
    });
});