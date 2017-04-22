<?php
session_start();
if($_SESSION['admin'] === "1"){ //If session is registered
	//session_destroy(); //Destroy it! So we are logged out now
	header( 'Content-Type: text/html; charset=utf-8' );
}
else{ 
	header("location: LOGIN.html"); // Redirect to login.php page
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="ADMIN.css">
	<script src="ADMIN.js"></script>
</head>
<body>
	<img src="MYTITLE.jpg" class="img-fluid" alt="Responsive image">
	<button id = "LOGOUT" type="button" class="btn btn-primary btn-lg">LOGOUT</button>
	
	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#home">IN-STOCK</a></li>
	  <li><a data-toggle="tab" href="#menu1">OUT-OF-STOCK</a></li>
	  <li><a data-toggle="tab" href="#menu2">ADD-STOCK</a></li>
	  <li><a data-toggle="tab" href="#menu3">REMOVE-STOCK</a></li>
	</ul>

	<div class="tab-content">
	  
	  <div id="home" class="tab-pane fade in active">
		
	  </div>
	  
	  <div id="menu1" class="tab-pane fade">
		
	  </div>
	  
	  <div id="menu2" class="tab-pane fade">
		<span id = "err1" class="label label-default"></span>
		<form id = "create-stock" enctype="multipart/form-data">
		  <div class="input-group input-group-lg">
			<label for="Category">Category</label>
			<input type="text" class="form-control input-lg" id="Category1">
		  </div>
		  <div class="input-group input-group-lg">
			<label for="ItemName">ItemName</label>
			<input type="text" class="form-control input-lg" id="ItemName1">
		  </div>
		  <div class="input-group input-group-lg">
			<label for="Quantity">Quantity</label>
			<input type="text" class="form-control input-lg" id="Quantity1">
		  </div>
		  <div class="input-group input-group-lg">
			<label for="Price">Price</label>
			<input type="text" class="form-control input-lg" id="Price1">
		  </div>
		  <div class="input-group input-group-lg">
			<label for="Image">Image</label>
			<input type="text" class="form-control input-lg" id="img">
		  </div>
		  <button type="submit" id = "ADD" class="btn btn-default btn-lg">ADD</button>
		</form>	
	  </div>
	  
	  <div id="menu3" class="tab-pane fade">
		<span id = "err2" class="label label-default"></span>
		<form id = "delete-stock">
		  <div class="input-group input-group-lg">
			<label for="Category">Category</label>
			<input type="text" class="form-control input-lg" id="Category2">
		  </div>
		  <div class="input-group input-group-lg">
			<label for="ItemName">ItemName</label>
			<input type="text" class="form-control input-lg" id="ItemName2">
		  </div>
		  <button type="submit" id = "DELETE" class="btn btn-default btn-lg">DELETE</button>
		</form>
	  </div>
	</div>
</body>
</html>