<!DOCTYPE html>

<?php
	session_start();
	if (isset($_SESSION['session_time'])){
		$time = $_SESSION['session_time'];
	}
	else{
		$time = 0;				
	}
	if (isset($_SESSION['id']) and isset($_SESSION['login']) 
		and isset($_SESSION['zalogowany']) and $_SESSION['zalogowany'] == true 
		and isset($_SESSION['last_login_time']) 
		and (time() - $_SESSION['last_login_time'] < $time))
	{
	  include("secret_page.php");
	}
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
?>

