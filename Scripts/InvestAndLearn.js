$(function() {      // Validate inputs
    // Fade away logout message
    $('#logged-out-state').fadeOut(4000);

    // Fade away form messages
    $('.form-msg').fadeOut(4000);

    // Fade away timeout message from any click on DOM
    $(document).click(function() {
        $('#timed-out-state').fadeOut(4000);
    });

    $(".user-form").submit(function(e) {  // function to execute upon 'submit' of any 'user-form' class element
        var userEmail = $("#user-email").val();
        var userPassword = $("#user-password").val();
        var userName = $("#user-name").val();
        if(userEmail == ""  ||  userPassword == ""  ||  userName == "") {
            alert("You must enter something in each starred '*' input field.\n");
            e.preventDefault();     // Upon error, prevent submission of inputs to the database.
        }
    });

    var timedOutCookie = document.cookie.split(";");
    var timedOut = timedOutCookie.split("=");
    
    if(timedOut[1] == "1") {
        alert("Timed out == 1");
        alert("timedOut[0]: " + timedOut[0] + ", timedOut[1]: " + timedOut[1]);
        disableAddSubmits();
    } else {
        alert("Timed out != 1");
        alert("timedOut[0]: " + timedOut[0] + ", timedOut[1]: " + timedOut[1]);
    }

    function disableAddSubmits() {
        $('.add-form').attr("disabled");
    }
});

function contactUs() {  // function called by 'Contact Us' <a> tag
    alert("Invest And Learn\n123Main Street\nBoise, ID  83702\n");
};