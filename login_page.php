<!DOCTYPE html>

<?php 
		session_start(); 	
?>

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
		<title>Chess world - log in</title>
		
		<link rel="icon" type="image/x-icon" href="images/chess_tower_icon.ico"> 
		<link rel="stylesheet" href="style.css">		
	</head>

    <body>
		<header>
			<h1>Log in to the Chess World</h1>
		</header>
	
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
		
		<!-- FORM -->
		<section id="login_section">	
			<h3>Fill fields with your email and password.</h3>
			<form action="login.php" autocomplete="on" style="font-size:15px"  method="POST">
				<fieldset>
					<legend>Log in:</legend><br>
					
					<label for="mail">Email: </label><br>
					<input type="email" id="mail" name="mail" required>
					mail_name@mail_server
					<br><br>
					
					<label for="pass">Password: </label><br>
					<input type="password" id="pass" name="pass" required>
					<br><br>
				
				<input type="submit" value="Log in">
				<input type="reset" value="Clear fields">
			</form>			
		</section><br>
		
		<?php
			$_SESSION['session_time'] = 120;
			$time = $_SESSION['session_time'];
			
			if (isset($_SESSION['blad']))
			{
				echo $_SESSION['blad'].'<br>';
			}
			
			if (isset($_SESSION['id']) and isset($_SESSION['login']) and 
				isset($_SESSION['last_login_time']) and (time() - $_SESSION['last_login_time'] < 120)){
				echo "You're already logged with email: ".$_SESSION['login'].".";
				$tt = $time - time() + $_SESSION['last_login_time'];
				echo "<br>Time left before log out: ".$tt."s";
			}
			else {
				unset($_SESSION['id']);
				unset($_SESSION['mail']);
				unset($_SESSION['login']);
				unset($_SESSION['name']);
				unset($_SESSION['surname']);
				unset($_SESSION['last_login_time']);
				unset($_SESSION['blad']);
				$_SESSION['zalogowany'] = false;
				echo "You're not logged yet.";
			}
		?>
	</body>
</html>