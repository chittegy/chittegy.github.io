<?php
session_start();
require_once 'database.php';

// Ensure the user is authenticated and session username is set
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] && isset($_SESSION['username'])) {
    // Fetch user details based on session username
    $user = fetchUserDetails($_SESSION['username']);

    // Store the username in a variable
    $username = $_SESSION['username'];
} else {
    // Redirect user to login page if not authenticated or session username is not set
    header("Location: login.php");
    exit(); // Stop further execution
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
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
        .navbar {
            background-color: #ff5733; /* Orange navbar color */
        }
        .btn-logout {
            background-color: transparent;
            color: #fff; /* White text color */
            border: none; /* No border */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Button text size */
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .btn-logout:hover {
            color: #ff5733; /* Orange text color on hover */
            background-color: #fff; /* White background color on hover */
        }
        .btn-action {
            margin-top: 10px; /* Add some top margin for spacing */
            background: orangered; /* Orange-red button color */
            color: blanchedalmond; /* Blanched almond text color */
            border: none; /* No border */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Button text size */
        }
        .btn-action:hover {
            opacity: 0.8; /* Reduce opacity on hover for visual feedback */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Full Stack Application</a>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <h2>User Details</h2>
                <h4>Username: <?php echo htmlspecialchars($user["username"]); ?></h4>
                <h4>Email: <?php echo htmlspecialchars($user["email"]); ?></h4>
                <form method="POST" action="changePassword.php">
                    <!-- Include a hidden input field to pass the username to changepassword.php -->
                    <input type="hidden" name="username" value="<?php echo htmlentities($username); ?>">
                    <button type="submit" class="btn btn-action">Change Password</button>
                </form>
                <form method="POST" action="editProfile.php">
                    <!-- Include a hidden input field to pass the username to editProfile.php -->
                    <input type="hidden" name="username" value="<?php echo htmlentities($username); ?>">
                    <button type="submit" class="btn btn-action">Edit Profile</button>
                </form>
            </div>
            <div class="col-md-9">
                <h2>Welcome, <?php echo htmlspecialchars($user["username"]); ?>!</h2>
                <p>This is the main content area. You can put your main content here.</p>
            </div>
        </div>
    </div>
</body>
</html>
