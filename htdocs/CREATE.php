<?php
	$userid = $_POST["userid"];
	$pwd = $_POST["pwd"];
	$db = mysqli_connect('localhost','root','root','oro');
	$uppercase = preg_match('@[A-Z]@', $pwd);
	$lowercase = preg_match('@[a-z]@', $pwd);
	$number    = preg_match('@[0-9]@', $pwd);
	if($userid == "" and $pwd == ""){
		echo '2';
	}
	else if($userid == ""){
		echo '3';
	}
	else if($pwd == ""){
		echo '4';
	}
	else if(!$uppercase || !$lowercase || !$number || strlen($pwd) < 5){
		echo '5';
	}
	else{
		$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
		$q = "INSERT into UserDB VALUES('$userid','$pwd',FALSE);";
		$result = $db->query($q);
		if($result == TRUE)
			echo '1';
		else
			echo '0';
	}
?>