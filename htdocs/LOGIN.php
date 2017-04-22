<?php
	$userid = $_POST["userid"];
	$pwd = $_POST["pwd"];
	$db = mysqli_connect('localhost','root','root','oro');
	$q = "SELECT * FROM UserDB where Username = '$userid';";
	$result = $db->query($q);
	$row = $result->fetch_assoc();
	if($userid == "" and $pwd == ""){
		echo '3';
	}
	else if($userid == ""){
		echo '4';
	}
	else if($pwd == ""){
		echo '5';
	}
	else if(mysqli_num_rows($result) != 1)
		echo '0';
	else if(password_verify($pwd, $row['Password'])) {
		session_start(); //Start the session
		if($row['isAdmin'] == 1){
			$_SESSION['admin']= '1';
			echo '1';
		}
		else{
			$_SESSION['name'] = $userid;
			echo '2';
		}
	}
	else{
		echo '0';
	}
?>