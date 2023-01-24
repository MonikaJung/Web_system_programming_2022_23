<?php


	$background = $_POST['background_color_selector'];
	$color = $_POST['color_selector'];
	$font = $_POST['font_selector'];
	
	if ($background == 1){
		setcookie("background", "rgb(216, 195, 176)", time() + 60, "/");}
	else if ($background == 2){
		setcookie("background", "blue", time() + 60, "/");}
	else if ($background == 3){
		setcookie("background", "yellow", time() + 60, "/");}
	else{
		setcookie("background", "green", time() + 60, "/");}
					
	if ($color == 10){
		setcookie("color", "black", time() + 60, "/");}
	else if ($color == 11){		
		setcookie("color", "white", time() + 60, "/");}
	else{
		setcookie("color", "rgb(100, 100, 100)", time() + 60, "/");}
					
	if ($font == 20){
		setcookie("font", "papyrus, fantasy", time() + 60, "/");}
	else if ($font == 21){
		setcookie("font", "monospace", time() + 60, "/");}
	else{
		setcookie("font", "Arial, Helvetica", time() + 60, "/");}
		

	//var_dump($_COOKIE);
	//var_dump($_POST);
	
	header('Location: action_page.php');
	exit();
?>
