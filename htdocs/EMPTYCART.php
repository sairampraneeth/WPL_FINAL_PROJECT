<?php
	session_start();
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "START TRANSACTION;";
	$result = $db->query($q);
	$q = "SELECT * from Cart where Purchased = 0 and UserName = '".$_SESSION['name']."';";
	$result = $db->query($q);
	while($row = mysqli_fetch_array($result)){
		$q = "update ItemDB set quantity = quantity + $row[2] where ID = $row[1];";
		$result2 = $db->query($q);
		$q = "delete from cart where Purchased = 0 and UserName = '$row[0]' and ID = $row[1];";
		$result2 = $db->query($q);
	}
	$q = "COMMIT;";
	$result = $db->query($q);
	echo '1';
?>