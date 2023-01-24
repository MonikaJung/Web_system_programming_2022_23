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
		<meta name="description" content="Chess world register success page">
		<meta name="keywords" content="chess, world, register, success">
		<meta name="authors" content="Rysiek Polkowski, Monika Jung">
        <!-- Website tittle -->
		<title>Chess world - register success</title>
		
		<link rel="icon" type="image/x-icon" href="images/chess_tower_icon.ico"> 
		<link rel="stylesheet" href="style.css">
		
	</head>

    <body>		
		
		<header>
			<h1>Registration succeded!</h1>
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
		echo '<p style="font-size:18px;color:#412216">You have an account now. Please, log in using email <strong>'
		.$_SESSION['mail'].'</strong> and chosen password :)</p>'; 
		
		
		?>
		<br><br>
		</section>
	
		<footer>
			<p>If you have any questions write an e-mail to 
			<a href="mailto:chess.world.info@o2.pl">chess.world.info@o2.pl</a> :)</p>
		</footer>

</body>
</html>
