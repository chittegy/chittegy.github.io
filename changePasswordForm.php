<?php
session_start();
require_once "database.php";
$token = $_POST["nocsrftoken"];
if(!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
    echo "CSRF Attack is detected";
    die();
}

if(isset($_POST["currentPassword"]) AND isset($_POST["newPassword"]) AND isset($_POST["newPassword2"])) {

    if($_POST["newPassword"] == $_POST["newPassword2"])
    {
        changePassword($_POST["username"], $_POST["newPassword"]);
        echo "<script>alert('Password changed successfully!!')</script>";
	    header("Refresh: 0;url=homePage.php");
        exit;
    }
}


?>
