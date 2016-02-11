function ExercisesController() {
    var exercisesModel = new ExercisesModel(),
        exercisesView = new ExercisesView();

    this.init = function () {
        exercisesModel.init();
        exercisesView.init();
        if (document.title == "Exercises") {
        	exercisesView.setNestedLoopsCallBack(function () {window.location.href = "nestedLoops.html"; });
        }
        else if (document.title ==  "Nested Loops") {
        	exercisesView.setNestedLoopsExercise1CallBack(function () {window.location.href = "nestedLoopsExercise1.php"; });
        	exercisesView.setNestedLoopsExercise2CallBack(function () {window.location.href = "nestedLoopsExercise2.php"; });
        	exercisesView.setNestedLoopsExercise3CallBack(function () {window.location.href = "nestedLoopsExercise3.php"; });
        }
    };
    
}

var exercisesController = new ExercisesController();

window.addEventListener("load", exercisesController.init, false);