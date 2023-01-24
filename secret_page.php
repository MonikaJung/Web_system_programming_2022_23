<!DOCTYPE html>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Chess world secret page">
		<meta name="keywords" content="chess, world, secret, logged, only">
		<meta name="authors" content="Rysiek Polkowski, Monika Jung">
        <!-- Website tittle -->
		<title>Chess world - secret page</title>
		
		<link rel="icon" type="image/x-icon" href="images/chess_tower_icon.ico"> 
		<link rel="stylesheet" href="style.css">
		
	</head>

    <body>		
		
		<header>
			<h1>Welcome to secret page!</h1>
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
		
		<!-- INTRODUCTION -->
		<br>
		<section id="introduction">
		
		<?php 
			echo '<p style="font-size:18px;color:#412216">Hello <strong>'.$_SESSION['name'].' '.$_SESSION['surname'].'</strong>!</p>';
		?>
		</section>
	
		<!-- FORM -->
		<section id="personal_data_section">	
			<h3>Here you can change your name, surname and password.</h3>
			<form action="secret_page_edit_data.php" autocomplete="on" style="font-size:15px"  method="POST">
				<fieldset>
					<legend>Name change:</legend><br>
					
					<label for="text">Name: </label><br>
					<input type="text" id="name" name="name" required>
					<?php echo "Current: ".$_SESSION['name']; ?>
					<br><br>
					
					<label for="text">Surname: </label><br>
					<input type="text" id="surname" name="surname" required>
					<?php echo "Current: ".$_SESSION['surname']; ?>
					<br><br>
				
				<input type="submit" value="Save changes">
				<input type="reset" value="Clear fields">
			</form>	
		</section>
		<br>
		<section id="password_section">	
			<form action="secret_page_edit_data.php" autocomplete="on" style="font-size:15px"  method="POST">
				<fieldset>
					<legend>Password change:</legend><br>
					
					<label for="pass">Password: </label><br>
					<input type="password" id="pass" name="pass" required>
					<br><br>
					
					<label for="pass2">Repeat the password: </label><br>
					<input type="password" id="pass2" name="pass2" required>
					<br><br>
				
				<input type="submit" value="Save changes">
				<input type="reset" value="Clear fields">
			</form>	
		</section><br>
		<?php
			if (isset($_SESSION['bladedycji'])){
				echo $_SESSION['bladedycji'];
				unset ($_SESSION['bladedycji']);
			}
				
			if (isset($_SESSION['udanaedycja'])){
				echo "Udana edycja: ".$_SESSION['udanaedycja'];
				unset ($_SESSION['udanaedycja']);
			}
		?>
	
		<footer>
			<p>If you have any questions write an e-mail to 
			<a href="mailto:chess.world.info@o2.pl">chess.world.info@o2.pl</a> :)</p>
		</footer>

</body>
</html>
