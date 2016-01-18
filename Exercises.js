function markQuestions() {
	var answer1 = document.getElementById("answer1").value;
	var answer2 = document.getElementById("answer2").value;
	
	if (answer1 == 6 && answer2 == 2) {
		alert("Well done!!! You got 2/2 Correct");	
	}
	else if (answer1 == 6 || answer2 ==2) {
		alert("You got 1/2 correct, please try again");
	}
	else {
		alert ("You got 0/2 correct, please try again");
	}
}