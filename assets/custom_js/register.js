$('#first_name').keyup(function(){
    $('#first_name').css({'color':'#000', 'border':'1px solid #2892ff'});
    $("#first_name").focus();
    return false;
})
$('#last_name').keyup(function(){
    $('#last_name').css({'color':'#000', 'border':'1px solid #2892ff'});
    $("#last_name").focus();
    return false;
})
$('#username').keyup(function(){
    $('#username').css({'color':'#000', 'border':'1px solid #2892ff'});
    $("#username").focus();
    return false;
})
$('#email').keyup(function(){
    $('#email').css({'color':'#000', 'border':'1px solid #2892ff'});
    $("#email").focus();
    return false;
})
$('#username').keyup(function(){
    if($('#username').val().length >= 8) {
        $('#username').css({'color':'#000', 'border':'1px solid #2892ff'});
        $("#username").focus();
        return false;
    }
})
$('#password').keyup(function(){
    if($('#password').val().length >= 6) {
        $('#password').css({'color':'#000', 'border':'1px solid #2892ff'});
        $("#password").focus();
        return false;
    }
})
function btn_register() {
    var base_url = $('#base_url').val();
	var first_name = $('#first_name').val();
	var last_name = $('#last_name').val();
    var username = $('#username').val();
    var email = $('#email').val().trim();
    var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var mobile = $('#mobile').val();
    var phoneRegex = /^\d{10}$/;
    var password = $('#password').val();
	var conf_password = $('#conf_password').val();
    //var user_type = $('#user_type').val();
    var location = $('#location').val();
	var latitude = $('#search_lat').val();
	var longitude = $('#search_lon').val();

	if(first_name == '') {
		$('#first_name').prop('placeholder','Enter First Name');
        $('#first_name').css({'color':'red', 'border':'1px solid red'});
		$("#first_name").focus();
		return false;
	}
	if(last_name == '') {
		$('#last_name').prop('placeholder','Enter Last Name');
		$('#last_name').css({'color':'red', 'border':'1px solid red'});
		$("#last_name").focus();
		return false;
	}
    if(username == '') {
        $('#username').prop('placeholder','Enter User Name');
		$('#username').css({'color':'red', 'border':'1px solid red'});
		$("#username").focus();
		return false;
    }
    if(username.length < 8) {
        $('#err_username').html('Username should be at least 8 characters long');
		$('#err_username').css({'color':'red'});
        $('#username').css({'color':'red', 'border':'1px solid red'});
        setTimeout(function(){$("#err_username").html("");},3000)
		$("#err_username").focus();
		return false;
    }
    if(email == '') {
		$('#email').prop('placeholder','Enter valid email or mobile number');
		$('#email').css({'color':'red', 'border':'1px solid red'});
		$("#email").focus();
		return false;
	} else {
        if(!isNaN(email)) {
            if(!phoneRegex.test(email)) {
                $("#err_email").fadeIn().html("Please enter a valid phone number").css({'color':'red','margin-bottom':'5px'});
                $('#email').css({'color':'red', 'border':'1px solid red'});
                setTimeout(function(){$("#err_email").html("");},5000)
                $("#err_email").focus();
                return false;
            }
        } else {
            if(!emailRegex.test(email)) {
                $("#err_email").fadeIn().html("Please enter a valid email").css({'color':'red','margin-bottom':'5px'});
                $('#email').css({'color':'red', 'border':'1px solid red'});
                setTimeout(function(){$("#err_email").html("");},5000)
                $("#err_email").focus();
                return false;
            }
        }
    }
	if(password=='') {
		$('#password').prop('placeholder','Enter password');
		$('#password').css({'color':'red', 'border':'1px solid red'});
		$("#password").focus();
		return false;
	}
   	if(password.length < 6) {
		$('#err_password').fadeIn().html('Password should be at least 6 characters long').css({'color':'red'});
        $('#password').css({'color':'red', 'border':'1px solid red'});
		setTimeout(function(){$("#err_password").html("");},3000);
		$("#password").focus();
		return false;
	}
	if(conf_password=='') {
		$('#conf_password').prop('placeholder','Enter confirm password');
		$('#conf_password').css({'color':'red', 'border':'1px solid red'});
		$("#conf_password").focus();
		return false;
	}
   	if(conf_password.length<6) {
		$('#err_confpassword').fadeIn().html('Confirm Password should be at least 6 characters long').css({'color':'red'});
        $('#conf_password').css({'color':'red', 'border':'1px solid red'});
		setTimeout(function(){$("#err_confpassword").html("");},3000);
		$("#conf_password").focus();
		return false;
	}
	if (password != conf_password) {
		$('#err_check_pass').fadeIn().html('Password Mismatch').css({'color':'red','margin': '0px'});
        $('#password').css({'color':'red', 'border':'1px solid red'});
        $('#conf_password').css({'color':'red', 'border':'1px solid red','margin': '0px'});
		setTimeout(function(){$("#err_check_pass").html("");},3000);
		return false;
	}
    // if(user_type == '') {
	// 	$('#err_usertype').fadeIn().html('Please select user type').css({'color':'red','margin-bottom':'5px'});
	// 	setTimeout(function(){$("#err_usertype").html("");},3000);
	// 	$("#user_type").focus();
	// 	return false;
	// }

    if ($("#agreecheck").is(":checked") == false) {
        $('.erroragree').text('Please agree to the terms and conditions.');
        setTimeout(function(){$(".erroragree").html("");},3000);
        return false; // Prevent form submission
    }

    $.ajax({
        type: "POST",
        url: base_url+'user/Login/checkusername',
        data: {username: username},
        dataType:'json',
        beforeSend : function(){

		},
		success:function(returndata) {
			//console.log(returndata.result);
            if(returndata.result == 'success') {
				$('#err_username').fadeIn().html(returndata.data).css({'color':'green','margin-bottom':'5px'});
				setTimeout(function(){
                    $.ajax({
                        url: base_url+'save',
                        type: 'POST',
                        data: {first_name: first_name, last_name: last_name, username: username, email:email, password:password, location:location, latitude:latitude, longitude:longitude},
                        dataType:'json',
                        beforeSend : function(){
                            $("#rSignUp").text("Please Wait...");
                            $("#rSignUp").prop("disable", "true");
                        },
                        success:function(returndata) {
                            if(returndata.result == 'email') {
                                $('#err_email').fadeIn().html('You are already registered with us.').css({'color':'red','margin-bottom':'5px'});
                                setTimeout(function(){$("#err_email").html("");},3000);
                                $("#email").focus();
                                $("#rSignUp").text("Sign Up");
                                return false;
                            }
                            if(returndata.result == 'success') {
                                $('#signUp_form').hide();
                                $('.select-user').hide();
                                $('#register-messages p').text(returndata.data);
                                $('#register-messages').show();
                                $("#signUp_form")[0].reset();
                            } else {
                                $('#err-messages p').text(returndata.data);
                                $('#err-messages').show();
                                setTimeout(function () {
                                     $('#err-messages').hide();
                                 }, 20000);
                                $("#rSignUp").text("Sign Up");
                            }
                        }
                    });
                },3000);
			} else {
				$('#err_username').fadeIn().html(returndata.data).css({'color':'red','margin-bottom':'5px'});
				setTimeout(function(){$("#err_username").html("");},3000);
				$("#username").focus();
				return false;
			}
		}
    })
}
function checkPass() {
	var x = document.getElementById("password");
  	if (x.type === "password") {
    	x.type = "text";
  	} else {
    	x.type = "password";
  	}
}
function checkConfPass() {
	var x = document.getElementById("conf_password");
  	if (x.type === "password") {
    	x.type = "text";
  	} else {
    	x.type = "password";
  	}
}
