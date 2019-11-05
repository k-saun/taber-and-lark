<?php
session_start();
$_SESSION = array();
include_once("DAO.php");
$dao = new DAO();

if (isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2'])) {
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
}

if ($pass1 != $pass2) {
	$_SESSION['message'] = "Passwords do not match!";
   	header("Location: /register.php");
   	exit;
}

// Creating submitted user data from database
$result = $dao->createUser($email, $pass1);
if($result) {
	#$_SESSION['message'] = "Success!";
	header("Location: /register.php");
	exit;
} else {
	#$_SESSION['message'] = "Something went wrong.";
	header("Location: /register.php");
	exit;
}



