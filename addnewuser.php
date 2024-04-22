<?php
session_set_cookie_params(15*60, "/", "waph-team25.minifacebook.com", TRUE, TRUE);
session_start(); 
require_once 'database.php';
if(isset($_POST["username"]) and isset($_POST["email"]) and isset($_POST["password"])) {
	if (registerNewUser($_POST["username"], $_POST["email"], $_POST["password"])) {
		$_SESSION['authenticated'] = TRUE;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
	}
	else{
		session_destroy();
		echo "Registration failed. Please try again!";
		echo "<script>window.location='registrationform.php';</script>";
		die();
	}
}
if(!isset($_SESSION['authenticated']) or $_SESSION['authenticated'] != TRUE) {
	session_destroy();
	echo "<script>alert('You have not login. Please login first!')</script>";
	header("Refresh: 0;url=registrationform.php");
	die();
}
if($_SESSION['browser'] != $_SERVER['HTTP_USER_AGENT']) {
	session_destroy();
	echo "<script>alert('Session hijacking attack is detected!')</script>";
	header("Refresh: 0;url=registrationform.php");
	die();
}

function registerNewUser($username, $email, $password) {
	return registerUser($username, $email, $password);
}
?>
<h2> Registration succeeded, You can login now !</h2>
<a href="login.php">Login</a>
