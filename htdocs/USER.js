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
			$("#bt2").empty();
			$("#bt2").append(response);
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
	
	$('#EMPTYCART').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'EMPTYCART.php',
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
});

function d(obj){
	$.ajax({
        type: 'POST',
        url: 'ADDCARTCLICK.php',
        data: {
			category: $("#bt").find('tr:eq(' + obj.id + ') td:eq(0)').text(),
			itemname: $("#bt").find('tr:eq(' + obj.id + ') td:eq(1)').text()
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
}

function d2(obj){
	$.ajax({
        type: 'POST',
        url: 'EMPTYCARTCLICK.php',
        data: {
			category: $("#bt2").find('tr:eq(' + obj.id + ') td:eq(0)').text(),
			itemname: $("#bt2").find('tr:eq(' + obj.id + ') td:eq(1)').text()
		},
		success: function(response){
			location.reload();
		}
    });
}