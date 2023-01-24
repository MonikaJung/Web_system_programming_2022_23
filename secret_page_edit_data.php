<?php
	session_start();
	if (isset($_SESSION['session_time'])){
		$_SESSION['session_time'] = 120;
		$time = $_SESSION['session_time'];
	}
	else{
		$time = 0;				
	}
	if (isset($_SESSION['id']) and isset($_SESSION['login']) 
		and isset($_SESSION['zalogowany']) and $_SESSION['zalogowany'] == true 
		and isset($_SESSION['last_login_time']) 
		and (time() - $_SESSION['last_login_time'] < $time))
	{}
	else
	{
		unset($_SESSION['id']);
		unset($_SESSION['mail']);
		unset($_SESSION['login']);
		unset($_SESSION['name']);
		unset($_SESSION['surname']);
		unset($_SESSION['last_login_time']);
		$_SESSION['zalogowany'] = false;

		echo "<script>";
		echo "alert('To see that page you have to log in.');";
		echo "window.location.replace('login_page.php');";
		echo "</script>";
		exit();
	}

	$change_name = false;
	$change_password = false;
	$email = $_SESSION['mail'];
	
	if (isset($_SESSION['udanaedycja']))
		unset($_SESSION['udanaedycja']);
	
	
	if (isset($_POST['name']) and isset($_POST['surname']))
	{
		$new_name = $_POST['name'];
		$new_surname = $_POST['surname'];
		$change_name = true;
	}	
	else if (isset($_POST['pass']) and isset($_POST['pass2']))
	{
		$new_pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		$change_password = true;
	}
	else if((!isset($_POST['name'])) || (!isset($_POST['surname'])) || (!isset($_POST['pass'])) || (!isset($_POST['pass2'])))
	{
		$_SESSION['bladedycji'] = "Not every required field is filled";
		header('Location: secret_page_verify.php');
		exit();
	}
	
	$sql1 = "this is query.....";
	
	if($change_name == true)
	{
		$sql1 = "UPDATE users 
				SET 
					name = '$new_name',
					surname = '$new_surname'
				WHERE
					email = '$email';";
					
		$respond = "New name and surname set.";
	}
	
	
	if($change_password == true){
		if ($_POST['pass'] != ($_POST['pass2'])){
		$_SESSION['bladedycji'] = "Both passwords should be the same";
		header('Location: secret_page_verify.php');
		exit();
		}
		else{
			$sql1 = "UPDATE users 
					SET 
						password = '$new_pass'
					WHERE 
						email = '$email';";
			$respond = "New password set.";
		}
	}

	mysqli_report(MYSQLI_REPORT_STRICT);
		
	try 
	{
		// connect to database ---------------------------------------
		include 'db_connection.php';
		
		$polaczenie = $conn;
		if ($polaczenie->connect_errno!=0)
		{
			echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			throw new Exception(mysqli_connect_errno());
		}
		else
		{
			//Czy email istnieje
			$sql = "SELECT id FROM users WHERE email='$email';";
			
			$rezultat = $polaczenie->query($sql);
			
			if (!$rezultat) throw new Exception($polaczenie->error);
			$wszystko_OK = true;
			$ile_takich_maili = $rezultat->num_rows;
			if($ile_takich_maili<1)
			{
				$_SESSION['bladrejestracji']="User with that email does not exists";
				$wszystko_OK=false;
				$_SESSION['mail']="Nie ma takiego konta!";
			}		
			
			if ($wszystko_OK and ($change_name or $change_password))
			{				
				if($change_name == true)
				{
					$_SESSION['name'] = $new_name;
					$_SESSION['surname'] = $new_surname;
				}
				include 'db_connection.php';
				$polaczenie->query($sql1);
				$_SESSION['udanaedycja'] = 'tak';
				header('Location: secret_page_verify.php');
			}
			else{
				$_SESSION['udanaedycja'] = 'nie';
				header('Location: secret_page_verify.php');
			}
			
			$polaczenie->close();
		}
		
	}
	catch(Exception $e)
	{
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
		echo '<br />Informacja developerska: '.$e;
	}
?>