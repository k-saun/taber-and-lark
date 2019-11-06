<?php
session_start();
$_SESSION = array();
include_once("DAO.php");
$dao = new DAO();

//the array for errors / success messages to be entered
$msgs = array();

//did the user enter an email
if(empty($_POST['email'])){
	array_push($msgs, "Email field is required.");
}

//did the user enter a password
if(empty($_POST['pass1'])){
	array_push($msgs, "Password field is required.");
}

//just checking if the values have been set
if (isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2'])) {
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
}

//Is this a real email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  array_push($msgs, "That doesn't look like an email.");
}

//Do the passwords match
if ($pass1 != $pass2) {
	array_push($msgs, "Passwords do not match!");
} else {
	$pass = $pass1;
}

//Password validation
if($pass == 'password' || $pass == "Password") {
	array_push($msgs, "Seriously? \"Password\"?");
	} else {
	if (strlen($pass) <= '6') {
	    array_push($msgs, "Your password must contain at least 6 characters!");
	}
	if(!preg_match("#[0-9]+#",$pass)) {
	    array_push($msgs, "Your password must contain at least 1 Number!");
	}
	if(!preg_match("#[A-Z]+#",$pass)) {
	    array_push($msgs, "Your password must contain at least 1 Capital Letter!");
	}
	if(!preg_match("#[a-z]+#",$pass)) {
	    array_push($msgs, "Your password must contain at least 1 lowercase letter!");
	}
}

//if there were errors, assign session['message'] to equal the array of errors and then return to register.php
if(!empty($msgs)) {
	$_SESSION['message'] = $msgs;
	header("Location: /register.php");
	exit;
}

// Creating submitted user data from database
$result = $dao->createUser($email, $pass);
if($result) {
	array_push($msgs, "Success!");
	$_SESSION['message'] = $msgs;
	header("Location: /login.php");
	exit;
} else {
	array_push($msgs, "Sorry! Something went wrong.");
	$_SESSION['message'] = $msgs;
	header("Location: /register.php");
	exit;
}







