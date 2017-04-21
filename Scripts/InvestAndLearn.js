$(function() {      // Validate inputs
    // Fade away logout message
    $('#logged-out-state').fadeOut(4000);

    // Fade away form messages
    $('.form-msg:visible').fadeOut(4000);

    // Reset each add form cookies state and hide message on screen
    // TODO:  Implement remaining ck_____AddState cookies.
    resetAddState('ckBlogAddState');
    // resetAddState("ckJoinAddState");
    // resetAddState("ckCalendarAddState");    
    // resetAddState("ckTestimonialAddState");
    
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

// Hide or show form message, depending on state, 
// then reset cookie's state to START.
function resetAddState(cname) {
   
    var state = Cookies.get(cname);
	console.log("InvestAndLearn.resetAddState():\nCookies.get(cname) -> " + state);
   
    var START = 0;
    var SUCCESS = 1;
    var FAILURE = -3

    switch (state) {
        case SUCCESS:
			console.log("InvestAndLearn.resetAddState():\nSUCCESS message should show, failed message should hide ... case SUCCESS (1), State = " + state);
            $('.failed:visible').hide();
            $('.succeeded:hidden').show();
            break;

        case FAILURE:
			console.log("InvestAndLearn.resetAddState():\nADD FAILED message should show, succeeded message should hide ... case ADD FAILED (-3), State = " + state);
            $('.succeeded:visible').hide();     
            $('.failed:hidden').show();
            break;

		case START:
			console.log("InvestAndLearn.resetAddState():\nNO MESSAGE s/b rendered since state s/b START ... case START (0), State = " + state);
			break;

        default:
            break;
    };

	// Re-set cookie to START state
	Cookies.set(cname, '');
    Cookies.set(cname, '0');
	state = Cookies.get(cname);
	console.log("InvestAndLearn.resetAddState():\nState just RESET s/b (0) ... State = " + state);

}
