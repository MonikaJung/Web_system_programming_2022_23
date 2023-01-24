<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Chess world logging page">
		<meta name="keywords" content="chess, world, login, password, email, log in">
		<meta name="authors" content="Rysiek Polkowski, Monika Jung">
        <!-- Website tittle -->
		<title>Chess world - log in result</title>
		
		<link rel="icon" type="image/x-icon" href="images/chess_tower_icon.ico"> 
		<link rel="stylesheet" href="style.css">		
	</head>
	
<body>
		
	<h1>Log in result</h1>
	
	<nav>
		<p>
			<a href="index.html"><strong>MAIN PAGE</strong></a>  | 
			<a href="chess_pieces.html"><strong>CHESS PIECES</strong></a> | 
			<a href="top_chess_players.html"><strong>TOP 10 BEST PLAYERS </strong></a> | 
			<a href="chess_training_form.php"><strong>SIGN UP FOR CHESS TRAINING</strong></a> | 
			<a href="numbers_game.html"><strong>NUMBERS GAME</strong></a> |
			<a href="article.html"><strong>WRITE ARTICLE</strong></a> |
			<a href="login_page.php"><strong>LOG IN</strong></a> | 
			<a href="register_page.php"><strong>REGISTER</strong></a> |
			<a href="secret_page_verify.php"><strong>SECRET PAGE</strong></a> |
			<a href="db_table.php"><strong>LOGINS TABLE</strong></a>
		</p>
	</nav>
		
	<?php
		// L9 - PHP 2 ------------------------------------------------------------------------------
			
		// SET SESSION DATA ---------------------------------------------- 	
		if (isset($_SESSION['id']) and isset($_SESSION['mail'])){
			
			echo '<h2>Welcome '.$_SESSION['mail'].'! You logged in successfully :)</h2>';
			$_SESSION['last_login_time'] = time();
		}
		else{
			echo "<h2>You didn't log in.</h2>";
		}
		
		
		
		require_once "db_connection.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		$mysqli = $conn;
		$sql = "SELECT name, surname FROM users ORDER BY name";

		if ($result = $mysqli -> query($sql)) {
			while ($row = $result -> fetch_row()) {
				printf ("%s (%s)\n", $row[0], $row[1]);
			}
			$result -> free_result();
		}
		
	?>

</body>


	</body>
</html> 
