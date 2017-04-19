$(function() {      // Validate inputs
    // Fade away logout message
    $('#logged-out-state').fadeOut(4000);

    // Fade away form messages
    $('.form-msg').fadeOut(4000);

    // Fade away timeout message from any click on DOM
    // $(document).click(function() {
    //     $('#timed-out-state').fadeOut(4000);
    // });

    // function to execute before 'submit' of any 'user-form' class element
    $(".user-form").submit(function(event) {
        // get email, password, and name if they exist.
        var userEmail = $("#user-email").val();
        var userPassword = $("#user-password").val();
        var userName = $("#user-name").val();

        // Upon error, prevent submission of inputs to the database.
        if (userEmail == ""  ||  userPassword == ""  ||  userName == "") {
            alert("You must enter something in each starred '*' input field.\n");
            event.preventDefault();
        }
    });
});

function contactUs() {  // function called by 'Contact Us' <a> tag
    alert("Invest And Learn\n123Main Street\nBoise, ID  83702\n");
};

