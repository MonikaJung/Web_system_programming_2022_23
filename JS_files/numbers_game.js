var correct_number = 0;
var guesses = -1;
var is_guessed = false;
var gave_up = false;


function choose_number() {
	guesses = 0;
	is_guessed = false;
	gave_up = false;
	correct_number = Math.floor(Math.random() * 100) + 1;
	document.getElementById("guesses").innerHTML="Guesses: "+guesses;
	document.getElementById("respond").innerHTML="Here you'll find a respond. Start guessing! ^^";
}

function check_number() {
	
	var num = document.getElementById("number").value;
	
	var number = 0;
	
	if (isNaN(num)) 
		var option = 4;
	else if (gave_up) 
		option = 5;
	else {
		number = parseInt(num);
		if (number == correct_number) option = 1;
		else if (number < correct_number) option = 2;
		else if (number > correct_number) option = 3;		
	}

	var respond = "You haven't write anything, how should I check it?";
	switch (option) {
		case 1:
			respond = "Wow, you're a genius! Your number is correct! ^^";
			is_guessed = true;
			break;
		case 2:
			respond = "Your number is too small, try again :)";
			break;
		case 3:
			respond = "Your number is too big, try again :)";
			break;
		case 4:
			respond = "Wrong type of data in the text field, try again.";
			break;
		case 5:
			respond = "You already gave up after "+guesses+" guesses, start a new game ;)";
	}
	
	if (option < 4) guesses = guesses + 1

	document.getElementById("respond").innerHTML=respond;
	document.getElementById("guesses").innerHTML="Guesses: "+guesses;
	
	/*//TEST:
	var res = "number: "+number+", answer: "+correct_number+", option: "+option;
	document.write(res);
	*/
}

function show_answer() {
	gave_up = true;
	document.getElementById("respond").innerHTML="The answer was "+correct_number+".";
}
