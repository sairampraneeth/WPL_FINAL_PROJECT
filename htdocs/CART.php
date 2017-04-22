<?php
	session_start();
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "SELECT Category,ItemName, Cart.Quantity, Price, Cart.Quantity * Price as Total, Image from Cart Join ItemDB on (Cart.ID = ItemDB.ID) where Purchased = 0 and Cart.UserName = '".$_SESSION['name']."';";
	$result = $db->query($q);
	if(mysqli_num_rows($result) == 0){
		echo '<b>Currently No Items in the Cart!</b>';
	}
	else{
		$price = 0;
		$ctr = 1;
		echo '<thead>';
		echo '<tr>';
		echo '<th>Category</th>';
		echo '<th>Item</th>';
		echo '<th>Quantity</th>';
		echo '<th>Price</th>';
		echo '<th>Total</th>';
		echo '<th>Image</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		while($row = mysqli_fetch_array($result)) {
			$price = $price + $row[4];
			echo '<tr>';
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo "<td><img src = 'uploads/".$row[5]."' style='width:100px;height:100px;' /></td>";
			echo "<td><a href = '' onclick = 'd2(this);' id = '$ctr'>Delete</a></td>";
			echo '</tr>';
			$ctr = $ctr + 1;
		}
		echo '<tr>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td><b>Net Total</b></td>';
		echo '<td><b>'.$price.'</b></td>';
		echo '<td></td>';
		echo '</tr>';
		echo '</tbody>';
	}
?>