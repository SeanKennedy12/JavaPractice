function JavaPracticeController() {
    var javaPracticeModel = new JavaPracticeModel(),
        javaPracticeView = new JavaPracticeView();

    this.init = function () {
        javaPracticeModel.init();
        javaPracticeView.init();
        if (document.getElementById("signIn")) {
        	javaPracticeView.setSignInCallBack(function () {window.location.href = "SignIn.php"; });
        }
        else {
        	javaPracticeView.setSignOutCallBack(function () {window.location.href = "SignOut.php"; });
        }
        javaPracticeView.setExercisesCallback(function () {window.location.href = "exercises.html"; });
        if (document.getElementById("progress")) {
        	javaPracticeView.setProgressCallback(function () {window.location.href = "StudentProgress.html"; });
        }
        else {
        	javaPracticeView.setClassProgressCallback(function () {window.location.href = "classProgress.html"; });
        }
        javaPracticeView.setAboutCallback(function () {window.location.href = "about.html"; });
        
        if (document.getElementById("admin")) {
        	javaPracticeView.setAdminCallback(function () {window.location.href = "admin.php"; });
        }
        if (document.getElementById("classProgress")) {
        	console.log("1");
        	javaPracticeView.setClassProgressCallback(function () {window.location.href = "classProgress.html"; });
        }
    };
    
}

var javaPracticeController = new JavaPracticeController();

window.addEventListener("load", javaPracticeController.init, false);