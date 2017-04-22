<?php
	session_start();
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "SELECT * from Cart where Purchased = 0 and UserName = '".$_SESSION['name']."';";
	$result = $db->query($q);
	while($row = mysqli_fetch_array($result)){
		$q = "START TRANSACTION;";
		$result = $db->query($q);
		$q = "insert into CART VALUES('$row[0]','$row[1]',$row[2],1) ON DUPLICATE KEY UPDATE Quantity = Quantity + $row[2];";
		$result = $db->query($q);
		$q = "delete from cart where Purchased = 0 and UserName = '$row[0]' and ID = $row[1];";
		$result = $db->query($q);
		$q = "COMMIT;";
		$result = $db->query($q);
		echo '1';
	}
?>