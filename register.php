<?php

	session_start();
	
	unset($_SESSION['bladrejestracji']);
	
	if ((!isset($_POST['mail'])) || (!isset($_POST['name'])) || (!isset($_POST['surname'])) || (!isset($_POST['pass'])) || (!isset($_POST['pass2'])))
	{
		$_SESSION['bladrejestracji'] = "Not every required field is filled";
		header('Location: register_page.php');
		exit();
	}
	if ($_POST['pass'] != ($_POST['pass2'])){
		$_SESSION['bladrejestracji'] = "Both passwords should be the same";
		header('Location: register_page.php');
		exit();
	}

	$_SESSION['mail'] = $_POST['mail'];
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['surname'] = $_POST['surname'];
	
	$email = $_SESSION['mail'];
	$name = $_SESSION['name'];
	$surname = $_SESSION['surname'];
	$pass = $_POST['pass'];
	
	$wszystko_OK = true;

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
			//Czy email już istnieje?
			$rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
			
			if (!$rezultat) throw new Exception($polaczenie->error);
			
			$ile_takich_maili = $rezultat->num_rows;
			if($ile_takich_maili>0)
			{
				$_SESSION['bladrejestracji']="User with that email already exists";
				$wszystko_OK=false;
				$_SESSION['mail']="Istnieje już konto przypisane do tego adresu email!";
			}		
			
			if ($wszystko_OK)
			{
				$sql = "INSERT INTO users (email, password, name, surname) VALUES ('$email', '$pass', '$name', '$surname')";
				if ($polaczenie->query($sql) === TRUE)
				{
					$_SESSION['udanarejestracja']=true;
					header('Location: register_success.php');
				}
				else
				{
					throw new Exception($polaczenie->error);
				}
				
			}
			else{
				header('Location: register_page.php');
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