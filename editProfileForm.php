<?php
session_start();
require_once "database.php";
$token = $_POST["nocsrftoken"];
if(!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
    echo "CSRF Attack is detected";
    die();
}

if(isset($_POST["newEmail"]) AND isset($_POST["newUsername"])) {

        editProfile($_POST["username"], $_POST["newEmail"], $_POST["newUsername"]);
        echo "<script>alert('Profile Edited Successfully!! Logout & Login to see the Updated Content!')</script>";
	    header("Refresh: 0;url=homePage.php");
        exit;
    
}


?>
