$(function() {
	$("#email_error").hide();
	$("#pass_error").hide();

	var email_error = false;
	var pass_error = false;

	$("#form_email").focusout(function(){
		$("#email_error").hide();
		if(!validate_email($("#form_email").val())){
			$("#email_error").html("Please enter a valid email address.");
			$("#email_error").show();
		}
	});

	function validate_email(email) {
		var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  		return regex.test(email);
	}
});