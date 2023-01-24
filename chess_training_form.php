<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Chess training form page">
		<meta name="keywords" content="chess, world, training, form, sign up">
		<meta name="authors" content="Rysiek Polkowski, Monika Jung">
        <!-- Website tittle -->
		<title>Chess world - training form</title>
		
		<link rel="icon" type="image/x-icon" href="images/chess_tower_icon.ico"> 
		<link rel="stylesheet" href="style.css">
		
	</head>

    <body onload="session_start()"> 
		
		<header>
			<h1>Chess Training Form</h1>
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
		<section id="chess_training_form">	
			<h3>Share with us as many information as you can</h3>
			<form action="action_page.php" autocomplete="on" style="font-size:15px">
				<fieldset>
					<legend>Personalia:</legend>
					
					<label for="fname">First name:</label><br>
					<input type="text" id="fname" name="fname" autofocus>
					<br>
					
					<label for="lname">Last name:</label><br>
					<input type="text" id="lname" name="lname" required>
					<br>
					
					<label for="mail">Email address:</label><br>
					<input type="email" id="mail" name="mail" required>
					mail_name@mail_server
					<br>
					
					<label for="birthmonth">Birth month:</label><br>
					<input list="months" name="birthmonth" id="birthmonth">
					<datalist id="months">
						<option value="January">
						<option value="February">
						<option value="March">
						<option value="April">
						<option value="May">
						<option value="June">
						<option value="July">
						<option value="August">
						<option value="September">
						<option value="October">
						<option value="November">
						<option value="December">
					</datalist>
					<br>
					
					<label for="phone">Phone number:</label><br>
					<input type="tel" id="phone" name="phone" pattern="[+]{1}[0-9]{2}[ ]{1}[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}">
					+XX XXX-XXX-XXX
					<br>
				</fieldset>
				
				<p>What is your chess rating system:</p>
				<select>
					<optgroup label="Kategorie krajowe okręgowe">
						<option>Fifth Category</option>
						<option>Fourth Category</option>
						<option>Third Category</option>
						<option>Second Category</option>
					</optgroup>
					<optgroup label="Tytuły i kategorie krajowe centralne">
						<option>First Category</option>
						<option>National Champion Candidate</option>
						<option>National Champion</option>
					</optgroup>
				</select>

				<p>What colour do you prefer to play?</p>
				<input type="radio" id="black" name="color" value="black">
					<label for="black">Black</label>
					<br>
				<input type="radio" id="white" name="color" value="white">
					<label for="white">White</label>
					<br>
				<input type="radio" id="nomatter" name="color" value="nomatter">
					<label for="nomatter">It doesn&#8217;t matter</label>
					<br>
				<br>
				
				<p>Why do you want to learn to play chess?</p>
				<input type="checkbox" id="checkbox1" name="reason[]" value="0">
					<label for="checkbox1"> I want to be famous grand champion one day</label>
					<br>
				<input type="checkbox" id="checkbox2" name="reason[]" value="1">
					<label for="checkbox2"> I want to travel the world during my chess career</label>
					<br>
				<input type="checkbox" id="checkbox3" name="reason[]" value="2">
					<label for="checkbox3"> I was inspired by the series &#34;Queens Gambit&#34;</label>
					<br>
				<input type="checkbox" id="checkbox4" name="reason[]" value="3">
					<label for="checkbox4"> I just want to learn how to play</label>
					<br>
				<br>
				
				<p>Why should we chose you?</p>
				<textarea name="message" rows="10" cols="40"></textarea>
				<br>
				
				<input type="submit" value="Submit">
				<input type="reset" value="Clear my answers">
			</form>
			
		</section>
		

