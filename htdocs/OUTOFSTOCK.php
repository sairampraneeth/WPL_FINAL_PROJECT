<?php
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "SELECT Category,ItemName,Quantity,Price,Image from ItemDB where Quantity = 0;";
	$result = $db->query($q);
	if(mysqli_num_rows($result) == 0){
		echo '<b>Currently No Items!</b>';
	}
	else{
		echo '<table class="table table-hover">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Category</th>';
		echo '<th>ItemName</th>';
		echo '<th>Quantity</th>';
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
			echo "<td>$row[3]</td>";
			echo "<td><img src = 'uploads/".$row[4]."' style='width:100px;height:100px;' /></td>";
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
?>