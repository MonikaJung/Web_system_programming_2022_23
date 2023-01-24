function f3(){
	switch(document.getElementById("theme selector").value){
		case "1":
			document.getElementById("zad3").style.backgroundColor = "rgb(216, 195, 176)";
			break;
		case "2":
			document.getElementById("zad3").style.backgroundColor = "blue";
			break;
		case "3":
			document.getElementById("zad3").style.backgroundColor = "yellow";
			break;
		case "4":
			document.getElementById("zad3").style.backgroundColor = "green";
			break;
		case "10":
			document.getElementById("zad3").style.color = "black";
			break;
		case "11":
			document.getElementById("zad3").style.color = "white";
			break;
		case "12":
			document.getElementById("zad3").style.color = "rgb(100, 100, 100)";
			break;
		case "20":
			document.getElementById("zad3").style.fontFamily = "papyrus, fantasy";
			break;
		case "21":
			document.getElementById("zad3").style.fontFamily = "monospace";
			break;
		case "22":
			document.getElementById("zad3").style.fontFamily = "Arial, Helvetica";
			break;
	}
}
