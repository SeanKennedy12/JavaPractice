/* 
 * The My317View handles the side menu and the about box within the view
 * It also handles callback registration for other menu items which the 
 * controller then decides how to action.
 */

function ExercisesView() {
       var addMouseAndTouchUp = function (elementID, handler) {
            //utility function to add both mouseup and touchend events and prevent double events
            var element = document.getElementById(elementID),
                f = function (e) {
                    e.preventDefault();//stops mobile browsers faking the mouse events after touch events
                    handler(e);
                    return false;
                    console.out(element);
                };
            element.addEventListener("mouseup", f, false);
            element.addEventListener("touchend", f, false);
        },
        showAbout = function () {
            //handle showing about box purely within the view as their's no model involved
            document.getElementById("popupAbout").style.display = "block";
            history.pushState(null, null, "#about");
        },
        hideAbout = function () {
            //handle hiding about box purely within the view
            document.getElementById("popupAbout").style.display = "none";
            if (openNav) { openCloseNav(); }
        };

    this.setNestedLoopsCallBack = function (callback) {
        addMouseAndTouchUp("nestedLoops", callback);
    };
    
    this.setNestedLoopsExercise1CallBack = function (callback) {
        addMouseAndTouchUp("nestedLoopsExercise1", callback);
    };
    
     this.setNestedLoopsExercise2CallBack = function (callback) {
        addMouseAndTouchUp("nestedLoopsExercise2", callback);
    };
    
    this.setNestedLoopsExercise3CallBack = function (callback) {
        addMouseAndTouchUp("nestedLoopsExercise3", callback);
    };

    this.init = function () {
        //addMouseAndTouchUp("about", showAbout);

        //handle closing of about window using history 
        //so that back buttons work (esp important on Android for hard back key
        //addMouseAndTouchUp("popupAbout", function () {window.history.back(); });
        //window.addEventListener("popstate", function (evt) {
        //    hideAbout();
        //});
        
        //document.getElementById("urlspan").innerHTML = window.location.protocol + "//" + window.location.host + window.location.pathname;
    };
}