function JavaPracticeController() {
    var javaPracticeModel = new JavaPracticeModel(),
        javaPracticeView = new JavaPracticeView();

    this.init = function () {
        javaPracticeModel.init();
        javaPracticeView.init();
        javaPracticeView.setSignInCallBack(function () {window.location.href = "signIn.html"; });
        javaPracticeView.setExercisesCallback(function () {window.location.href = "exercises.html"; });
        javaPracticeView.setProgressCallback(function () {window.location.href = "progress.html"; });
        javaPracticeView.setSettingsCallback(function () {window.location.href = "settings.html"; });
        javaPracticeView.setAboutCallback(function () {window.location.href = "about.html"; });
    };
    
}

var javaPracticeController = new JavaPracticeController();

window.addEventListener("load", javaPracticeController.init, false);