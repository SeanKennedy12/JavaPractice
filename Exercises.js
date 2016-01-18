function markQuestions(questionOrder) {
	this.questionOrder = questionOrder;
	
	var noOfQuestions = questionOrder.length;
	var score = 0;
	//keeps track of what questions are answered incorrectly
	var wrongQuestions = [1, 2];
	
	var questionAnswers = [6, 2, 01];
	
	var answer1 = document.getElementById("answer1").value;
	var answer2 = document.getElementById("answer2").value;
	
	console.log(answer1);
	console.log(questionAnswers[questionOrder[0]]);
	
	if(answer1 == questionAnswers[questionOrder[0]]) {
		score += 1;
		//array.splice(0, 1) removes the element at position 0
		wrongQuestions.splice(0, 1);
	}
	if(answer2 == questionAnswers[questionOrder[1]]) {
		score += 1;
		wrongQuestions.splice(1, 1);
	}
	
	if (score == noOfQuestions) {
		alert("You Scored " + score + "/" + noOfQuestions + ". Well Done!");
	}
	else if(score == noOfQuestions - 1) {
		alert("You Scored " + score + "/" + noOfQuestions + ". You answered question " + wrongQuestions + " incorrectly");
	}
	else {
		alert("You Scored " + score + "/" + noOfQuestions + ". You answered questions " + wrongQuestions + " incorrectly");
	}
}