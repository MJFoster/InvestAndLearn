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
    $(".user-form").submit(function(event) {
        // get email, password, and name if they exist.
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

// Returns a string representing the value of the given cookie.
// function getCookie(cname) {
//     var name = cname + "=";
//     var decodedCookie = decodeURIComponent(document.cookie);
//     var ca = decodedCookie.split(';');
//     for(var i = 0; i <ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0) == ' ') {
//             c = c.substring(1);
//         }
//         if (c.indexOf(name) == 0) {
//             return c.substring(name.length, c.length);
//         }
//     }
//     return "";
// }


// Sets a cookie with a value and expiration time in days.
// function setCookie(cname, cvalue, exdays) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exdays*24*60*60*1000));
//     var expires = "expires="+ d.toUTCString();
//     alert("expires String: " + expires
//       + "\ncookie name: " + cname
//       + "\ncookie value: " + cvalue);
//     // document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
//     newValue = getCookie(cname);
//     alert("setCookie() - new value s/b : " + cvalue + "Value is: " + newValue);
// }

// Hide or show form message, depending on state, 
// and reset cookie's state to START.
function resetAddState(cname) {
   
    // var state = getCookie(cname);
    var state = Cookies.get(cname);
    // alert("Cookies.get() value: " + state);
   
    var START = 0;
    var SUCCESS = 1;
    var FAILURE = -3

    switch (state) {
        case SUCCESS:
            $('.failed').hide();
            // alert("Add succeeded...");
            $('.form-msg.succeeded').show();
            break;

        case FAILURE:
            $('.succeeded').hide();     
            // alert("Add failed...");   
            $('.form-msg.failed').show();
            break;

        case START:
            // alert ("START ... do nothing.");
            $('.form-msg:visible').hide();            
            break;

        default:
            $('.form-msg:visible').hide();
            break;
    };

    Cookies.set(cname, START, { expires : 1 });
    // alert("resetAddState() : Cookies NEW value: " + Cookies.get(cname));
}




/*!
 * JavaScript Cookie v2.1.4
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
;(function (factory) {
	var registeredInModuleLoader = false;
	if (typeof define === 'function' && define.amd) {
		define(factory);
		registeredInModuleLoader = true;
	}
	if (typeof exports === 'object') {
		module.exports = factory();
		registeredInModuleLoader = true;
	}
	if (!registeredInModuleLoader) {
		var OldCookies = window.Cookies;
		var api = window.Cookies = factory();
		api.noConflict = function () {
			window.Cookies = OldCookies;
			return api;
		};
	}
}(function () {
	function extend () {
		var i = 0;
		var result = {};
		for (; i < arguments.length; i++) {
			var attributes = arguments[ i ];
			for (var key in attributes) {
				result[key] = attributes[key];
			}
		}
		return result;
	}

	function init (converter) {
		function api (key, value, attributes) {
			var result;
			if (typeof document === 'undefined') {
				return;
			}

			// Write

			if (arguments.length > 1) {
				attributes = extend({
					path: '/'
				}, api.defaults, attributes);

				if (typeof attributes.expires === 'number') {
					var expires = new Date();
					expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
					attributes.expires = expires;
				}

				// We're using "expires" because "max-age" is not supported by IE
				attributes.expires = attributes.expires ? attributes.expires.toUTCString() : '';

				try {
					result = JSON.stringify(value);
					if (/^[\{\[]/.test(result)) {
						value = result;
					}
				} catch (e) {}

				if (!converter.write) {
					value = encodeURIComponent(String(value))
						.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
				} else {
					value = converter.write(value, key);
				}

				key = encodeURIComponent(String(key));
				key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
				key = key.replace(/[\(\)]/g, escape);

				var stringifiedAttributes = '';

				for (var attributeName in attributes) {
					if (!attributes[attributeName]) {
						continue;
					}
					stringifiedAttributes += '; ' + attributeName;
					if (attributes[attributeName] === true) {
						continue;
					}
					stringifiedAttributes += '=' + attributes[attributeName];
				}
				return (document.cookie = key + '=' + value + stringifiedAttributes);
			}

			// Read

			if (!key) {
				result = {};
			}

			// To prevent the for loop in the first place assign an empty array
			// in case there are no cookies at all. Also prevents odd result when
			// calling "get()"
			var cookies = document.cookie ? document.cookie.split('; ') : [];
			var rdecode = /(%[0-9A-Z]{2})+/g;
			var i = 0;

			for (; i < cookies.length; i++) {
				var parts = cookies[i].split('=');
				var cookie = parts.slice(1).join('=');

				if (cookie.charAt(0) === '"') {
					cookie = cookie.slice(1, -1);
				}

				try {
					var name = parts[0].replace(rdecode, decodeURIComponent);
					cookie = converter.read ?
						converter.read(cookie, name) : converter(cookie, name) ||
						cookie.replace(rdecode, decodeURIComponent);

					if (this.json) {
						try {
							cookie = JSON.parse(cookie);
						} catch (e) {}
					}

					if (key === name) {
						result = cookie;
						break;
					}

					if (!key) {
						result[name] = cookie;
					}
				} catch (e) {}
			}

			return result;
		}

		api.set = api;
		api.get = function (key) {
			return api.call(api, key);
		};
		api.getJSON = function () {
			return api.apply({
				json: true
			}, [].slice.call(arguments));
		};
		api.defaults = {};

		api.remove = function (key, attributes) {
			api(key, '', extend(attributes, {
				expires: -1
			}));
		};

		api.withConverter = init;

		return api;
	}

	return init(function () {});
}));
