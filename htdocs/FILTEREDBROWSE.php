<?php
	$db = mysqli_connect('localhost','root','root','oro');
	$Category = $_POST['category'];
	$ItemName = $_POST['itemname'];
	$q = "SELECT Category,ItemName from ItemDB where Quantity > 0 and Category like '%$Category%' and ItemName like '%$ItemName%';";
	$result = $db->query($q);
	if(mysqli_num_rows($result) == 0){
		echo '<b>Sorry! No Items Match Your Search Criteria!</b>';
	}
	else{
		echo '<table class="table table-hover">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Category</th>';
		echo '<th>ItemName</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		while($row = mysqli_fetch_array($result)) {
			echo '<tr>';
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
?>