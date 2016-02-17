function ExercisesController() {
    var exercisesModel = new ExercisesModel(),
        exercisesView = new ExercisesView();

    this.init = function () {
        exercisesModel.init();
        exercisesView.init();
        if (document.title == "Exercises") {
        	exercisesView.setNestedLoopsCallBack(function () {window.location.href = "nestedLoops.html"; });
        	exercisesView.setRecursionCallBack(function () {window.location.href = "recursion.html"; });
        	exercisesView.setArraysCallBack(function () {window.location.href = "arrays.html"; });
        }
        else if (document.title == "My Progress") {
        	exercisesView.setNestedLoopsStudentProgressCallBack(function () {window.location.href = "nestedLoopsStudentProgress.php"; });
        	exercisesView.setRecursionStudentProgressCallBack(function () {window.location.href = "recursionStudentProgress.php"; });
        	exercisesView.setArraysStudentProgressCallBack(function () {window.location.href = "arraysStudentProgress.php"; });
        }
        else if (document.title == "Class Progress") {
        	exercisesView.setNestedLoopsProgressCallBack(function () {window.location.href = "nestedLoopsProgress.php"; });
        	exercisesView.setRecursionProgressCallBack(function () {window.location.href = "recursionProgress.php"; });
        	exercisesView.setArraysProgressCallBack(function () {window.location.href = "arraysProgress.php"; });
        }
        else if (document.title ==  "Nested Loops") {
        	exercisesView.setNestedLoopsExercise1CallBack(function () {window.location.href = "nestedLoopsExercise1.php"; });
        	exercisesView.setNestedLoopsExercise2CallBack(function () {window.location.href = "nestedLoopsExercise2.php"; });
        	exercisesView.setNestedLoopsExercise3CallBack(function () {window.location.href = "nestedLoopsExercise3.php"; });
        }
        else if (document.title ==  "Recursion") {
         	exercisesView.setRecursionExercise1CallBack(function () {window.location.href = "recursionExercise1.php"; });
         }
        else if (document.title ==  "Arrays") {
         	exercisesView.setArraysExercise1CallBack(function () {window.location.href = "arraysExercise1.php"; });
         }
    };
    
}

var exercisesController = new ExercisesController();

window.addEventListener("load", exercisesController.init, false);