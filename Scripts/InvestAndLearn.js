$(function() {      // Validate inputs
    // Fade away logout message
    $('#logged-out-state').fadeOut(4000);

    // Fade away form messages
    $('.form-msg:visible').fadeOut(4000);
    
    // function to execute before 'submit' of any 'user-form' class element
	// Gets email, password, and name if they exist.
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

function contactUs() {  // function called by 'Contact Us' <a> tag
    alert("Invest And Learn\n123Main Street\nBoise, ID  83702\n");
};

