function f2(){
	document.getElementById("odp21").innerHTML = "";
	
	const myImages = document.images;
	let text = "";
	let i;
	for (i = 0; i < myImages.length; i += 1) {
		text += myImages[i].src + "<br>";
	}
	document.getElementById("odp21").innerHTML = text;
	
	let forms = document.forms;
	//let forms = document.getElementsByTagName("form");
	document.getElementById("odp21").innerHTML += "myCarForm: " + forms.namedItem("myCarForm").innerHTML + "<br>";
	
	let myLinks = document.links;
	myLinks[0].style.border = "5px solid blue";
	myLinks[2].style.border = "5px solid green";
	let anchors = document.getElementsByTagName("a");
	document.getElementById("odp21").innerHTML += "The number of anchor elements in the document is: " + anchors.length;
	
	const p_list = document.getElementsByTagName("p");
	let p_text = p_list.item(0).innerHTML;
	document.getElementById("odp25").innerHTML += "<br>The first paragraph is '" + p_text +"'.";
}