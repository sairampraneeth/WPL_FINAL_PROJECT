<?php
	session_start();
	if(isset($_SESSION['name'])){ //If session is registered
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
	<link rel="stylesheet" href="USER.css">
</head>
<body>

	<button type="button" class="btn btn-info btn-lg pull-left" data-toggle="modal" data-target="#myModal">MY CART</button>
	
	<img src="MYTITLE.jpg" class="img-fluid" alt="Responsive image">
	<button id = "LOGOUT" type="button" class="btn btn-primary btn-lg">LOGOUT</button>
	<h1 class = "lead mark strong" id = "hellouser">
	<?php
		echo 'Hello! '.$_SESSION['name'];
	?>
	</h1>
	
	<ul class="nav nav-tabs nav-justified">
	  
	  <li class="active"><a data-toggle="tab" href="#BROWSE">BROWSE ITEMS</a>
	  
	  </li>
	  
	  <li><a data-toggle="tab" href="#HISTORY">MY HISTORY</a>
	  
	  </li>
	
	</ul>
	
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">MY CART</h4>
		  </div>
		  <div class="modal-body">
			<div id="CART" class="tab-pane fade in">
				<span id = "err2" class="label label-default"></span>
				<button type="submit" id = "CHECKOUT" class="btn btn-default btn-lg">CHECKOUT</button>
				<button type="submit" id = "EMPTYCART" class="btn btn-default btn-lg">EMPTY CART</button>
				<div id = "MINIBROWSE2">
					<table class="table table-bordered" id = "bt2" style = "width:50%;">
					</table>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
	
	<div class="tab-content">
		<div id="BROWSE" class="tab-pane fade in active">
			<span id = "err1" class="label label-default"></span>
			<form>
				<div class="input-group input-group-lg">
					<label for="Category">Category</label>
					<input type="text" class="form-control input-lg" id="CATEGORY">
				</div>
				<div class="input-group input-group-lg">
					<label for="ItemName">ItemName</label>
					<input type="text" class="form-control input-lg" id="ITEMNAME">
				</div>
				<button type="submit" id = "SEARCH" class="btn btn-default btn-lg">SEARCH</button>
			</form>
			<br>
			<div id = "MINIBROWSE">
				<table class="table table-bordered" id = "bt" style = "width:50%;">
				</table>
			</div>
		</div>
	
		<div id="HISTORY" class="tab-pane fade in">
			<div id = "MINIBROWSE3"></div>
		</div>
	</div>
	
</body>
<script src="USER.js"></script>
</html>