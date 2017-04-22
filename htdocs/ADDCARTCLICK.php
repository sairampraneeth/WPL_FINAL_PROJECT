<?php
	session_start();
	$db = mysqli_connect('localhost','root','root','oro');
	$Category = $_POST['category'];
	$ItemName = $_POST['itemname'];
	$q = "SELECT ID,Category,ItemName from ItemDB where Quantity > 0 and Category like '%$Category%' and ItemName like '%$ItemName%';";
	$result = $db->query($q);
	$row = $result->fetch_assoc();
	$q = "START TRANSACTION;";
	$result = $db->query($q);
	$q = "INSERT into CART VALUES('".$_SESSION['name']."',".$row['ID'].",1,0) ON DUPLICATE KEY UPDATE Quantity = Quantity + 1;";
	$result = $db->query($q);
	$q = "UPDATE ItemDB SET Quantity = Quantity - 1 where ID = ".$row['ID'].";";
	$result = $db->query($q);
	$q = "COMMIT;";
	$result = $db->query($q);
	echo '1';
?>