<?php
session_start();
require_once 'database.php';
$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['nocsrftoken'] = $rand;

// Check if the username is passed in the POST data
if(isset($_POST['username'])) {
    // Retrieve the username from the POST data
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
    // Now you can use $username in your code as needed
    echo "Username: " . $username;

    // Fetch user details based on the username if necessary
} else {
    // Handle case where username is not passed in the POST data
    echo "Username not found in form submission.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1c1c1c; /* Black background */
            color: #fff; /* White text color */
        }
        .container {
            margin-top: 50px;
        }
        .btn-primary {
            background-color: orangered; /* Orange-red button color */
            border-color: orangered; /* Orange-red border color */
        }
        .btn-primary:hover {
            background-color: #ff6d40; /* Lighter shade of orange-red on hover */
            border-color: #ff6d40; /* Lighter shade of orange-red border color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Edit Profile</h3>
        <form id="regForm" action="editProfileForm.php" method="POST" class="form login">
            <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />
            <input type="hidden" name="username" value="<?php echo $username; ?>" />

            <div class="form-group">
                <label for="newEmail">New Email</label>
                <input type="email" class="form-control" id="newEmail" name="newEmail" required>
            </div>
            <div class="form-group">
                <label for="newUsername">New Username:</label>
                <input type="username" class="form-control" id="newUsername" name="newUsername" required>
            </div>
            <button type="submit" class="btn btn-primary">Edit Profile</button>
        </form>
    </div>
</body>
</html>
