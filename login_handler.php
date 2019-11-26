<?php
session_start();
include_once("DAO.php");
$dao = new DAO();
$msgs = array();

//did the user enter an email
if(empty($_POST['email'])){
	array_push($msgs, "Email field is required.");
} else {
	//Is this a real email
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	  array_push($msgs, "Please enter a valid email address.");
	}
}

//did the user enter a password
if(empty($_POST['pass'])){
	array_push($msgs, "Password field is required.");
}

//if there were errors, assign session['message'] to equal the array of errors and then return to register.php
if(!empty($msgs)) {
	$_SESSION['message'] = $msgs;
	header("Location: /login.php");
	exit;
}

//just checking if the values have been set
if (isset($_POST['email']) && isset($_POST['pass'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
}

// Getting submitted user data from database
$user = $dao->getUser($email);
	
// Verify user password and set $_SESSION
$valid = false;
if(password_verify($pass, $user['user_password'])) {
	$_SESSION['email'] = $user['email'];
	$valid = true;
} else 

$_SESSION = array();
if ($valid) {
   	$_SESSION['logged_in'] = true;
   	$_SESSION['user_email'] = $email;
   	header("Location: /profile.php");
   	exit; 	
} else {
	array_push($msgs, "Invalid Credentials!");
	$_SESSION['message'] = $msgs;
   	header("Location: /login.php");
   	exit;
}