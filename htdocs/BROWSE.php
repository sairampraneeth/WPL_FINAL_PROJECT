<?php
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "SELECT Category,ItemName,Price,Image from ItemDB where Quantity > 0;";
	$result = $db->query($q);
	if(mysqli_num_rows($result) == 0){
		echo '<b>Currently No Items! Sorry for the Inconvinience!</b>';
	}
	else{
		echo '<thead>';
		echo '<tr>';
		echo '<th>Category</th>';
		echo '<th>Item</th>';
		echo '<th>Price</th>';
		echo '<th>Image</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		while($row = mysqli_fetch_array($result)) {
			echo '<tr>';
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td><img src = 'uploads/".$row[3]."' style='width:100px;height:100px;' /></td>";
			echo '</tr>';
		}
		echo '</tbody>';
	}
?>