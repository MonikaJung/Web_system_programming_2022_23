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
		<meta name="description" content="Chess world logins data table">
		<meta name="keywords" content="chess, world, data, table, logins, login, filter">
		<meta name="authors" content="Rysiek Polkowski, Monika Jung">
        <!-- Website tittle -->
		<title>Chess world - logins table</title>
		
		<link rel="icon" type="image/x-icon" href="images/chess_tower_icon.ico"> 
		<link rel="stylesheet" href="style.css">	
	</head>

    <body>		
		<header>
			<h1>Logins table</h1>
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
		<section id="db_table_filter_section">	
			<h3>Choose name and/or surname of users you're looking for. You may left the fields empty.</h3>
			<form action="db_table.php" autocomplete="on" style="font-size:15px"  method="POST">
				<fieldset>
					<legend>Filter:</legend><br>
					
					<label for="name_f">Name: </label>&nbsp;&nbsp;&nbsp;
					<input type="text" id="name_f" name="name_f">&nbsp;&nbsp;&nbsp;&nbsp;
					
					<label for="surname_f">Surname: </label>&nbsp;&nbsp;&nbsp;
					<input type="text" id="surname_f" name="surname_f">&nbsp;&nbsp;&nbsp;&nbsp;
					
					<label for="sort">Sorting: </label>&nbsp;&nbsp;&nbsp;
					<select id="sort" name="sort">
						<option id="sort0" value="">Choose sorting...</option>
						<option id="sort1" value="name">By name A-Z</option>
						<option id="sort2" value="surname">By surname A-Z</option>
						<option id="sort3" value="email">By mail A-Z</option>
						<option id="sort1" value="name desc">By name Z-A</option>
						<option id="sort2" value="surname desc">By surname Z-A</option>
						<option id="sort3" value="email desc">By mail Z-A</option>
					</select>
					<br><br>
				
				<input type="submit" value="Show results">&nbsp;
				<input type="reset" value="Clear fields">
			</form>			
		</section><br>
		
		<?php include "db_table_filter.php"; ?>
	
		<footer>
			<p>If you have any questions write an e-mail to 
			<a href="mailto:chess.world.info@o2.pl">chess.world.info@o2.pl</a> :)</p>
		</footer>
	</body>
</html>