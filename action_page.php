<!DOCTYPE html>

<?php
	 
// L9 - PHP 2 ------------------------------------------------------------------------------
	
// SET COOKIES ----------------------------------------------
	// TEST COOKIE
	setcookie("test_cookie", "test", time() + 3600, '/'); // check if enabled

	$cookie_name = "user";
	$cookie_value = "User1";
	setcookie($cookie_name, $cookie_value, time() + 60, "/");
?>



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
	<title>Chess world - training form backend?</title>
	
	<link rel="icon" type="image/x-icon" href="images/chess_tower_icon.ico"> 
	<link rel="stylesheet" href="style.css">

</head>
<body onload = "start_cookie()">


	<nav>
		<p>
			<a href="index.html"><strong>MAIN PAGE</strong></a>  | 
			<a href="chess_pieces.html"><strong>CHESS PIECES</strong></a> | 
			<a href="top_chess_players.html"><strong>TOP 10 BEST PLAYERS </strong></a> | 
			<a href="chess_training_form.php"><strong>SIGN UP FOR CHESS TRAINING</strong></a> | 
			<a href="numbers_game.html"><strong>NUMBERS GAME</strong></a> |
			<a href="article.html"><strong>WRITE ARTICLE</strong></a> |
			<a href="login_page.php"><strong>LOG IN</strong></a> | 
			<a href="secret_page_verify.php"><strong>SECRET PAGE</strong></a>
		</p>
	</nav>

	<?php
		
		// L9 - PHP 2 ------------------------------------------------------------------------------
		
		// READ COOKIES ----------------------------------------------
		echo "CHECKING IF COOKIES ENABLED:<br>";
		
		if (count($_COOKIE) > 0){
			echo "Cookies are enabled :&gt <br>";
		}
		else {
			echo "Cookies are disabled :&lt <br>";
		}


		echo "READING COOKIES:<br>";
		if(!isset($_COOKIE[$cookie_name])) {
		  echo "Cookie named '" . $cookie_name . "' is not set!";
		} 
		else {
			$val = $_COOKIE[$cookie_name];
		  echo "Cookie '" . $cookie_name . "' is set!<br>\nValue is: " . $val;
		}
		
		print_r($_COOKIE);
		
		if(!isset($_COOKIE["background"]))
			setcookie("background", "rgb(216, 195, 176)", time() + 60, "/");
		if(!isset($_COOKIE["color"]))
			setcookie("color", "black", time() + 60, "/");
		if(!isset($_COOKIE["font"]))
			setcookie("font", "monospace", time() + 60, "/");

		echo '
		<script>
			function start_cookie(){
				
				document.getElementById("cookie panel").style.backgroundColor = "' . $_COOKIE["background"] . '";
				document.getElementById("cookie panel").style.color = "' . $_COOKIE["color"] . '";
				document.getElementById("cookie panel").style.fontFamily = "' . $_COOKIE["font"] . '";
			}
		</script>';
		
		echo "<br><br>";
	?>
	
	
	<div id="cookie panel">
		<h3>
			Wybierz kolor tła, kolor czcionki i rodzaj czcionki
		</h3>

		<div>
			Wybierz kolor tła:
			<br>
			<form action="action_page_helper.php" method="post">
			
				<select id="background color selector" name="background color selector" onclick="to_cookie1()">
					<option value="1">Default</option>
					<option value="2">Blue</option>
					<option value="3">Yellow</option>
					<option value="4">Green</option>	
				</select>
				<br><br>
				
				Wybierz kolor czcionki:
				<br>
				<select id="color selector" name="color selector" onclick="to_cookie2()">
						<option value="10">Black</option>
						<option value="11">White</option>
						<option value="12">Dark grey</option>
				</select>
				<br><br>

				Wybierz rodzaj czcionki:
				<br>
				<select id="font selector" name="font selector" onclick="to_cookie3()">
						<option value="20">papyrus, fantasy</option>
						<option value="21">Times new roman</option>
						<option value="22">Arial, Helvetica, sans-serif</option>
				</select><br>
				<input type="submit" value="Zapisz swoje ustawienia" />
				
			</form><br><br>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
		<br>
		
		<script>
		function to_cookie1(){
			switch(document.getElementById("background color selector").value){
				case "1":
					document.getElementById("cookie panel").style.backgroundColor = "rgb(216, 195, 176)";
					break;
				case "2":
					document.getElementById("cookie panel").style.backgroundColor = "blue";
					break;
				case "3":
					document.getElementById("cookie panel").style.backgroundColor = "yellow";
					break;
				case "4":
					document.getElementById("cookie panel").style.backgroundColor = "green";
					break;
			}
		}
		function to_cookie2(){
			switch(document.getElementById("color selector").value){
				case "10":
					document.getElementById("cookie panel").style.color = "black";
					break;
				case "11":
					document.getElementById("cookie panel").style.color = "white";break;
				case "12":
					document.getElementById("cookie panel").style.color = "rgb(100, 100, 100)";
					break;
			}
		}
		function to_cookie3(){
			switch(document.getElementById("font selector").value){
				case "20":
					document.getElementById("cookie panel").style.fontFamily = "papyrus, fantasy";
					break;
				case "21":
					document.getElementById("cookie panel").style.fontFamily = "monospace";
					break;
				case "22":
					document.getElementById("cookie panel").style.fontFamily = "Arial, Helvetica";
					break;
			}
		}
		</script>

	</div>
	<br>
	<br>
    <?php
		// L8 - PHP 1 ---------------------------------------------------------------------
	echo "-------L8-----------------------------------------------------------------------------------";
        //tablica asocjacyjna
        $cena = array(
            'jogurt' => '2 zł',
            'maslo' => '1.50 zł',
            'zapiekanka' => '4 zł',
            'gazeta'  => '5 zł'
        );
        //foreach
		echo '<b>Usage of foreach and tablica asocjacyjna</b><br>';
        foreach ($cena as $klucz => $wartosc)
            echo $klucz." -> ".$wartosc."<br>\n";

        //tablica indeksowana numerycznie
        $cars = array("Volvo", "BMW", "Toyota"); 
        //for
		echo '<b>Usage of for and tablica indeksowana</b><br>';
        for ($i = 0; $i < 3; $i++) 
            echo $cars[$i] . ", ";
        
        echo "<br>\n";
		
		//inna tablica superglobalna
		echo '<b>Usage of superglobal array</b><br>';
		echo $_SERVER['PHP_SELF'];
		echo "<br>";
		echo $_SERVER['SERVER_NAME'];
		echo "<br>";
		echo $_SERVER['HTTP_HOST'];
		echo "<br>";
		echo $_SERVER['HTTP_REFERER'];
		echo "<br>";
		echo $_SERVER['HTTP_USER_AGENT'];
		echo "<br>";
		echo $_SERVER['SCRIPT_NAME'];
		echo 'a';
		echo "<br>";

		$ip = $_SERVER['REMOTE_ADDR'];

		echo $ip;
		echo "<br>\n";
		echo "<br>\n";
		
		//porównywanie łańcuchów
		echo '<b>String comparision</b><br>';
		$str1 = '0';
		$str2 = 'str2';
		$str3 = 0;
		echo 'String comparison using strcmp: '.$str1.'; '.$str2.'; ';
		var_dump(strcmp($str1, $str2));
		echo '<br>String comparison using ==: '.$str1.'; '.$str2.'; ';
		var_dump($str1 == $str2);
		echo '<br>String comparison using ===: '.$str1.'; '.$str2.'; ';
		var_dump($str1 === $str2);
		echo '<br>Variable comparison using ==: '.$str1.'; '.$str3.'; ';
		var_dump($str1 == $str3);
		echo '<br>Variable comparison using ===: '.$str1.'; '.$str3.'; ';
		var_dump($str1 === $str3);
		echo "<br>";
		
		//znaki specjalne
		echo '<b>Special characters</b><br>';
		$str = "This is some <b>bold</b> text.";
		echo htmlspecialchars($str);
		echo "<br>";
		$str = '&amp &quot &#039 &lt &gt';
		echo $str;
		echo 'I\'ll be back <br>';
		echo 'Czy na pewno chcesz skasować C:\\*.*? <br>';
		
		//preg_replace
		echo '<b>Usage of preg_replace(preg_match is used in telephone validation)</b><br>';
		$str = 'Use the force!';
		$pattern = '/force/i';
		echo preg_replace($pattern, 'preg_replace', $str);
		echo "<br>";
		
		//funkcje sterujące
		echo '<b>Usage of funkcje sterujące</b><br>';
		$people = array("Peter", "Joe", "Glenn", "Cleveland");
		echo 'current: '.current($people) . "<br>";
		echo 'key: '.key($people) . "<br>";
		echo 'next: '.next($people) . "<br>";
		echo 'current: '.current($people) . "<br>";
		echo 'key: '.key($people) . "<br>";
		echo 'reset: '.reset($people) . '<br>';
		echo 'key: '.key($people) . "<br>";
		echo 'count: '.count($people) . '<br>';
		
		//operatory
		echo '<b>Usage of operators</b><br>';
		$int1 = 103;
		$int2 = 3;
		echo '+: '.$int1+$int2. "<br>";
		echo '-: '.$int1-$int2. "<br>";
		echo '*: '.$int1*$int2. "<br>";
		echo '/: '.$int1/$int2. "<br>";
		echo '%: '.$int1%$int2. "<br>";
		echo '**: '.$int1**$int2. '<br>';
		echo '<br>';
		$int1=$int2;
		echo '=: '.$int1=$int2."<br>";
		$int1+=$int2;
		echo '+=: '.$int1."<br>";
		$int1-=$int2;
		echo '-=: '.$int1."<br>";
		$int1*=$int2;
		echo '*=: '.$int1."<br>";
		$int1/=$int2;
		echo '/=: '.$int1."<br>";
		$int1%=$int2;
		echo '%=: '.$int1.'<br>';
		echo '<br>';
		$int1 = 7;
		$int2 = 5;
		echo '==: ';
		var_dump($int1==$int2);
		echo '<br>===: ';
		var_dump($int1===$int2);
		echo '<br>!=: ';
		var_dump($int1!=$int2);
		echo '<br><>: ';
		var_dump($int1<>$int2);
		echo '<br>!==: ';
		var_dump($int1!==$int2);
		echo '<br>&gt: ';
		var_dump($int1<$int2);
		echo '<br>&lt: ';
		var_dump($int1>$int2);
		echo '<br>&lt=: ';
		var_dump($int1<=$int2);
		echo '<br>&lt=&gt: ';
		var_dump($int1<=>$int2);
		echo '<br>';
		$result = ($int1+$int2)*$int1**$int2;
		echo '(7+5)*7^5='.$result;
		echo "<br><br>";
		
		// stale, typowanie dynamiczne, kowersja typow, rzutowanie -------------------------------------
		
		const MIN_VALUE = 0;	//	typowanie dynamiczne - PHP sam wybiera typ
		const MAX_VALUE = 10;
		
		$firstVal = (string) '5feerhsth';		// rzutowanie typu - tymczasowe ustawienie typu
		$secondVal = (int) 20;
		
		settype($firstVal, 'integer');			//konwersja typu - zmiana typu na int ($firstVal = 5)
		
		// porównania
		if ($firstVal < MAX_VALUE && $firstVal > MIN_VALUE){
			$firstVal = (string) "The first value '{$firstVal}' is correct.";
		}
		else {
			$firstVal = (string) "The first value '{$firstVal}' is incorrect.";
		}
		if ($secondVal < MAX_VALUE && $secondVal > MIN_VALUE){
			$secondVal = (string) "The first value '{$secondVal}' is correct.";
		}
		else {
			$secondVal = (string) "The first value '{$secondVal}' is incorrect.";
		}
		echo $firstVal . '<br/>' . $secondVal;
		echo "<br><br>";

        // fname -----------------------------------------------
		if (isset($_POST['fname']) && $_POST['fname'] != "") {
			$name = $_POST['fname'];
			echo 'Your name: ' . $name;
		}
		else {
			echo "ERROR: First name field can't stay empty.";
		}
		echo "<br>\n";
        
		// lname -----------------------------------------------
		if (isset($_POST['lname']) && $_POST['lname'] != "") {
			$lname = $_POST['lname'];
			echo 'Your last name: ' . $lname;
		}
		else {
			echo "ERROR: Last name field can't stay empty.";
		}
		echo "<br>\n";
		
		// mail ------------------------------------------------
		if (isset($_POST['mail'])) {
			$mail = $_POST['mail'];
			if(str_contains($mail, '@wp.pl') ||  str_contains($mail, '@gmail.com') || str_contains($mail, '@o2.pl') || str_contains($mail, '@onet.com'))
			{
				echo "Your mail: {$mail}";
			}
			else {
				echo "Your mail is incorrect!";
			}
		}
		else {
			echo "ERROR: Eail field can't stay empty.";
		}
		echo "<br>\n";
        
		
		// bmonth ----------------------------------------------
		if(isset($_POST['birthmonth']) && $_POST['birthmonth'] != "") {
			$month = $_POST['birthmonth'];
			echo 'Your birthmonth: ' . $month;
		}
		else {
			echo "ERROR: You must choose a birthmonth.";
		}
		echo "<br>\n";
		
		// phone -----------------------------------------------
		if (isset($_POST['phone']) && preg_match( "/[+]{1}[0-9]{2}[ ]{1}[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}/", $_POST['phone'])) {
			$phone = $_POST['phone'];
			echo 'Your phone: '. $phone;
		}
		else if (!preg_match( "/[+]{1}[0-9]{2}[ ]{1}[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}/", $_POST['phone'])) {
			echo 'Your phone is incorrect';
		}
		else {
			echo "ERROR: Phone field can't stay empty.";
		}
		echo "<br>\n";
		
		// color -----------------------------------------------
		if(isset($_POST['color'])){
			if($_POST['color'] == 'black') 
				echo "Chosen color: BLACK";
			else if ($_POST['color'] == 'white') 
				echo "Chosen color: WHITE";
			else 
				echo "Chosen color: no matter";
		}
		else {
			echo "ERROR: You must choose chess color.";
		}
		echo "<br>\n";


		// reason ----------------------------------------------
		$reason = "";
		if(isset($_POST['reason'])){
			foreach ($_POST['reason'] as $i)
			for($i=0; $i<count($_POST['reason']); $i++){
				$reason = $reason . $_POST['reason'][$i] . '<br />';
				}
		}
		else{
			$reason = 'No reason chosen';
		}
		echo "Reasons: <br /> {$reason}";
		echo "<br>\n";

		//die()
		die('To już koniec');

		// message ---------------------------------------------
		if (isset($_POST['message'])) {
			echo 'Your message:' . '<br />' . $_POST['message'];
		}
		echo "<br>\n";
		?>

</body>
</html> 
