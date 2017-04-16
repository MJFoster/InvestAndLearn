$(function() {      // Validate inputs

    // Fade away logout message
    $('#logged-out-state').delay(3000).fadeOut(3000);

    // Fade away timeout message
    $(document).click(function(e) {
        $('#timed-out-state:visible').fadeOut(3000);
    });

    $(".user-form").submit(function(e) {  // function for any <form> element
        var userEmail = $("#user-email").val();
        var userPassword = $("#user-password").val();
        var userName = $("#user-name").val();
        if(userEmail == ""  ||  userPassword == ""  ||  userName == "") {
            alert("You must enter something in each starred '*' input field.\n");
            e.preventDefault();     // Upon error, prevent submission of inputs to the database.
        }
    });

});

function contactUs() {  // function called by 'Contact Us' <a> tag
    alert("Invest And Learn\n123Main Street\nBoise, ID  83702\n");
};