<?php
session_set_cookie_params(15*60, "/", "waph-team25.minifacebook.com", TRUE, TRUE);
session_start(); 
require_once 'database.php';
if(isset($_POST["username"]) and isset($_POST["password"])) {

    if(loginUser($_POST["username"], $_POST["password"])) {
        $_SESSION['authenticated'] = TRUE;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
        echo "Login successful!";
        header("Location: homePage.php");
        exit;
    }
    else {
        session_destroy();
		//echo "Login failed! Please try again";
		echo "<script>window.location='login.php';</script>";
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
	header("Refresh: 0;url=login.php");
	die();
}

?>
<html>
    <body>
<h2> You are Logged in now !</h2>
<h2> Welcome <?php echo htmlentities($_SESSION['username']); ?> !</h2>
<button>Change Password</button>
    </body>
</html>

