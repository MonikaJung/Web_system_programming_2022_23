function f5() {
	const form5 = document.getElementById('form5');

	form5.addEventListener('focus', (event) => {
	  event.target.style.background = "cyan";
	}, true);

	form5.addEventListener('blur', (event) => {
	  event.target.style.background = "rgb(200, 200, 200)";
	}, true);
}

function f5ResetForm() {
	if (confirm("Czy na pewno chcesz zresetować formularz?"))
	{
		document.getElementById("form5").reset(); 
		alert("Zresetowano formularz :)");
	}
	else {
		alert("Twój formularz nie został zresetowany.");
	}
}

function f5Submit() {
	document.getElementById("form5").submit();
}
