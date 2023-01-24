function counting_time(){

	/*
	function number_to_str(var num){
		var result = "";
		if (num < 10){
			result = "0" + num.toString();
		}
		else{
			result = num.toString();
		}
		return result;
	}
	*/
	
	var today_date = new Date();
	
	// date	
	var num = today_date.getDate();
	if (num < 10) 
		var day = "0" + num; 
	else 
		day = num;
	
	num = today_date.getMonth() + 1;
	if (num < 10) 
		var month = "0" + num; 
	else 
		month = num;
	
	var year = today_date.getFullYear();
	
	// time
	num = today_date.getHours();
	if (num < 10) 
		var hour = "0" + num; 
	else 
		hour = num;
	
	num = today_date.getMinutes();
	if (num < 10) 
		var minutes = "0" + num; 
	else 
		minutes = num;
	
	num = today_date.getSeconds();
	if (num < 10) 
		var seconds = "0" + num; 
	else 
		seconds = num;
				
	document.getElementById("clock").innerHTML = day+"-"+month+"-"+year+" | "+hour+":"+minutes+":"+seconds;
	
	setTimeout("counting_time()", 1000);
}
		