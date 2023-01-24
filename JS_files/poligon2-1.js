function f1(){
	const newDiv = document.createElement("div");

	const newContent = document.createTextNode("createElement, createTextNode, appendChild, insertBefore");

	newDiv.appendChild(newContent);

	const currentDiv = document.getElementById("div1");
	const parentDiv = document.getElementById("zad1");
	parentDiv.insertBefore(newDiv, currentDiv);
}

function f12(){
	const sp1 = document.createElement("span");

	sp1.id = "newSpan";

	const sp1_content = document.createTextNode("replaceChild");

	sp1.appendChild(sp1_content);

	const sp2 = document.getElementById("childSpan");
	const parentDiv = sp2.parentNode;

	parentDiv.replaceChild(sp1, sp2);
}

function f13(){
	let d = document.getElementById("top");
	let d_nested = document.getElementById("nested");
	let throwawayNode = d.removeChild(d_nested);
}

function f14(){
	let parent = document.getElementById("list_row").parentNode;
	document.getElementById("odp14").innerHTML = parent.nodeName;
	
	const newLi = document.createElement("li");
	const newText = document.createTextNode("Water");
	newLi.appendChild(newText);
	
	parent.insertBefore(newLi, parent.children[1]);
}