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
        javaPracticeView.setProgressCallback(function () {window.location.href = "progress.html"; });
        javaPracticeView.setSettingsCallback(function () {window.location.href = "settings.html"; });
        javaPracticeView.setAboutCallback(function () {window.location.href = "about.html"; });
    };
    
}

var javaPracticeController = new JavaPracticeController();

window.addEventListener("load", javaPracticeController.init, false);