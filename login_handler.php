<?php
session_start();
include_once("DAO.php");
$dao = new DAO();

if (isset($_POST['user_email']) && isset($_POST['password'])) {
	$user_email = $_POST['user_email'];
	$password = $_POST['password'];
}

// Getting submitted user data from database
$user = $dao->getUser($_POST['user_email']);
	
// Verify user password and set $_SESSION
$valid = false;
if ($password == $user['user_password']) {
	$_SESSION['user_email'] = $user['user_email'];
	$valid = true;
} else 

$_SESSION = array();
if ($valid) {
   	$_SESSION['logged_in'] = true;
   	header("Location: /success.php");
   	exit;
} else {
	$_SESSION['message'] = "Invalid Credentials!";
   	header("Location: /login.php");
   	exit;
}