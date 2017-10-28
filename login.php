<?php
	require('config/config.php');
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);

		$sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";

		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		// $active = $row['active'];

		$count = mysqli_num_rows($result);
		
		if($count == 1){
			$_SESSION['login_user'] = $username;
			header('Location: welcome.php');
		}
		else{
			header('Location: '.ROOT.'');
		}

	}

?>