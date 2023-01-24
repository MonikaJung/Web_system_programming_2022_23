<?php

	session_start();
	
	if ((!isset($_POST['mail'])) || (!isset($_POST['pass'])))
	{
		header('Location: login_page.php');
		exit();
	}

	include "db_connection.php";

	$polaczenie = $conn;
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		
		$mail = htmlentities($mail, ENT_QUOTES, "UTF-8");
		$pass = htmlentities($pass, ENT_QUOTES, "UTF-8");
	
	
		$sql = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'",
						mysqli_real_escape_string($polaczenie,$mail),
						mysqli_real_escape_string($polaczenie,$pass));
		
	
		if ($rezultat = $polaczenie->query($sql))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['mail'] = $wiersz['email'];
				$_SESSION['login'] = $wiersz['email'];
				$_SESSION['name'] = $wiersz['name'];
				$_SESSION['surname'] = $wiersz['surname'];
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: action_page_login.php');
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Wrong email address or password!</span>';
				header('Location: login_page.php');
				
			}
		}
		
		$polaczenie->close();
	}
	
?>