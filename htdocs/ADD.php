<?php
	$category = $_POST["category"];
	$itemname = $_POST["itemname"];
	$quantity = $_POST["quantity"];
	$img = $_POST["img"];
	$price = $_POST["price"];
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "INSERT into ItemDB(Category,ItemName,Quantity,Price,Image) VALUES('$category','$itemname',$quantity,$price,'$img');";
	$result = $db->query($q);
	if($category == "" or $itemname == "" or $quantity == "" or $img == "" or $price == "")
		echo '2';
	else if($result == TRUE){
		echo '1';
	}
	else{
		$q = "UPDATE ItemDB set Quantity = Quantity + $quantity, Image = '$img', Price = $price  where ItemName = '$itemname';";
		$result = $db->query($q);
		echo '0';
	}
?>