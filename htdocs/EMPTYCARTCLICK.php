<?php
	session_start();
	$Category = $_POST['category'];
	$ItemName = $_POST['itemname'];
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "START TRANSACTION;";
	$result = $db->query($q);
	$q = "SELECT Cart.UserName, Cart.ID, Cart.quantity from Cart join ItemDB on Cart.ID = ItemDB.ID where Purchased = 0 and UserName = '".$_SESSION['name']."' and Category = '$Category' and ItemName = '$ItemName';";
	$result = $db->query($q);
	while($row = mysqli_fetch_array($result)){
		$q = "update ItemDB set quantity = quantity + $row[2] where ID = $row[1];";
		$result = $db->query($q);
		$q = "delete from cart where Purchased = 0 and UserName = '$row[0]' and ID = $row[1];";
		$result = $db->query($q);
	}
	$q = "COMMIT;";
	$result = $db->query($q);
	echo '1';
?>