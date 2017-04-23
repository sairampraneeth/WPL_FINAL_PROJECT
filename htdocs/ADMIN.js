$(document).ready(function() {
	$("#home").load("INSTOCK.php");
	$("#menu1").load("OUTOFSTOCK.php");
	
	$('#ADD').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ADD.php',
            data: {
				category: $("#Category1").val(),
				itemname: $("#ItemName1").val(),
				quantity: $("#Quantity1").val(),
				img: $("#img").val(),
				price: $("#Price1").val()
			},
			success: function(response){
				if(response == '1'){
					location.reload(true);
				}
				else if(response == '2'){
					$("#err1").empty();
					$("#err1").append("Input Fields cannot be empty!!");
				}
				else{
					$("#err1").empty();
					$("#err1").append("Item exists in database!! Updated Quantity value has been given instead!!");
				}
			}
        });
    });
	
	$('#DELETE').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'DELETE.php',
            data: {
				category: $("#Category2").val(),
				itemname: $("#ItemName2").val()
			},
			success: function(response){
				if(response == '1'){
					location.reload(true);
				}
				else if(response == '2'){
					$("#err2").empty();
					$("#err2").append("Input Fields cannot be empty!!");
				}
				else{
					location.reload(true);
					$("#err2").empty();
					$("#err2").append("Error Deleting Item!!");
				}
			}
        });
    });
	
	$('#LOGOUT').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'LOGOUT.php',
            data: {},
			success: function(response){
				window.location.replace("INDEX.html");
			}
        });
    });
});