function f4(){
	let text = "";
	if (event.altKey) {
		text += "The ALT key was pressed!\n";
	} else {
		text += "The ALT key was NOT pressed!\n";
	}
	
	if (event.ctrlKey) {
		text += "The CTRL key was pressed!\n";
	} else {
		text += "The CTRL key was NOT pressed!\n";
	}
	
	if (event.shiftKey) {
		text += "The SHIFT key was pressed!\n";
	} else {
		text += "The SHIFT key was NOT pressed!\n";
	}

	text += event.keyCode + "\n";
	
	text += "Client- X coords: " + event.clientX + ", Y coords: " + event.clientY + "\n";

	text += "Screen- X coords: " + event.screenX + ", Y coords: " + event.screenY;
	
	alert(text);
}

function f42(e){
	let unicode= event.which;
	document.getElementById("odp4").innerHTML = unicode;
}

function f43(e) {
	var x = e.clientX;
	var y = e.clientY;
	var coor = "Coordinates: (" + x + "," + y + ")";
	document.getElementById("odp4").innerHTML = coor;
}
function mouseDown() {
	document.getElementById("zad4").style.backgroundColor = "red";
}

function mouseUp() {
	document.getElementById("zad4").style.backgroundColor = "green";
}
function bigImg(x) {
	x.style.height = "100px";
	x.style.width = "100%";
}

function normalImg(x) {
	x.style.height = "32px";
	x.style.width = "32px";
}