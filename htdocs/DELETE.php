<?php
	$category = $_POST["category"];
	$itemname = $_POST["itemname"];
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "UPDATE ItemDB set Quantity = 0 where Category = '$category' and ItemName = '$itemname';";
	$result = $db->query($q);
	if($result == TRUE){
		echo '1';
	}
	else{
		echo '0';
	}
?>