$(function() {
	var pass_errors = [];

	$("#email_error").hide();
	hide_pass_e();

	$("#form_email").focusout(function(){
		$("#email_error").hide();
		if(!validate_email($("#form_email").val())){
			$("#email_error").html("Please enter a valid email address.");
			$("#email_error").show();
		}
	});

	$("#form_pass1").focusout(function(){
		pass_errors = [];
		hide_pass_e();
		if(!validate_pass($("#form_pass1").val())){
			var i = 1;
			for (var msg of pass_errors) {
				$("#pass_error_".concat(i)).html(pass_errors[i-1]);
				$("#pass_error_".concat(i)).show();
				i++;
			}
		}
	});

	$("#form_pass2").focusout(function() {
		$("#pass_error_4").hide();
		if($("#form_pass2").val() != $("#form_pass1").val()){
			$("#pass_error_4").html("Passwords do not match.");
			$("#pass_error_4").show();
		}
	});

	function validate_email(email) {
		var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  		return regex.test(email);
	}

	function validate_pass(pass) {
		var success = true;
		if(pass.length > 0){ 
			if(pass.length < 6) {
				pass_errors.push("Your password must contain at least 6 characters.");
				success = false;
				alert(pass.length);
			}
			var regex = /[0-9]/;
			if(!regex.test(pass)){
				pass_errors.push("Your password must contain at least 1 number.");
				success = false;
			}
			var regex = /[a-z]/;
			if(!regex.test(pass)){
				pass_errors.push("Your password must contain at least 1 lowercase letter.");
				success = false;
			}
			var regex = /[A-Z]/;
			if(!regex.test(pass)){
				pass_errors.push("Your password must contain at least 1 capital letter.");
				success = false;
			}
		}
		return success;
	}

	function hide_pass_e() {
		$("#pass_error_1").hide();
		$("#pass_error_2").hide();
		$("#pass_error_3").hide();
		$("#pass_error_4").hide();
	}
});