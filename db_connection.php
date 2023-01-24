<?php

	$db_host = "localhost";
	$db_user = "root";
	$db_password = "123";
	$db_name = "users_db";
	
	$conn = new mysqli($db_host, $db_user, $db_password, $db_name)
	or die("Connect failed: %s\n". $conn->error);
	
?>