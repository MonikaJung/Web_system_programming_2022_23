function f6(){
	function aStrictFunction() {
	  // Function-level strict mode syntax
	  "use strict";
	  function secondStrictModeFunction() {
		return "~Nested text~";
	  }
	  return `Here you'll see text from nested function: ${secondStrictModeFunction()}`;
	}
	let text1 =  aStrictFunction();
	document.getElementById("odp6").innerHTML= text1;
}
