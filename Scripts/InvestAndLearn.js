$(function() {      // Validate inputs
    // Fade away logout message
    $('#logged-out-state').fadeOut(4000);

    // Fade away form messages
    $('.form-msg:visible').fadeOut(6000);
    $('.form-error-message:visible').fadeOut(6000);
    
    // Before 'submit' of any 'user-form' class element,
	// confirm email, password, and name are not empty.
    $(".user-form").submit(function(event) {
        var userEmail = $("#user-email").val();
        var userPassword = $("#user-password").val();
        var userName = $("#user-name").val();

        // Upon error, prevent submission of inputs to the database.
        if (userEmail == ""  ||  userPassword == ""  ||  userName == "") {
            // alert("You must enter something in each starred '*' input field.\n");
            event.preventDefault();
        }
    });


});

// Called from 'Contact Us' anchor tag for information.
function contactUs() {
    alert("\n\n\t\tYou Can Find Us At...\n\nInvest And Learn\n123Main Street\nBoise, ID  83702\n");
};

