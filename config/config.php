<?php

	
	define('ROOT','http://localhost/themoneykeeper');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "moneykeeper";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if(!$conn){
		echo "Not connected";
	}

?>