<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h3>Register - Full Stack Application</h3>
    <form id="regForm" action="addnewuser.php" method="POST" class="form login">
      <div class="row">
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="username" required>
            <label for="username">Username</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" required
              pattern="[^\s@]+@[^\s@]+\.[^\s@]+">
            <label for="email">Email</label>
            <div class="invalid-feedback">Please enter a valid email address</div>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" required
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            <label for="password">Password</label>
            <div class="invalid-feedback">Password must be at least 8 characters long, and include at least one digit, one lowercase letter, and one uppercase letter.</div>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch?'Passwords do not match.':'');">
            <label for="confirm_password">Confirm Password</label>
            <div class="invalid-feedback">Passwords do not match</div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
      <div class="col-12">
                    <p class="m-0 text-secondary text-center">Already have an account? <a href="login.php"
                        class="link-primary text-decoration-none">Login</a></p>
      </div>
    </form>
  </div>
</body>

</html>








<!-- 



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h3>Register</h3>
		<form id="regForm" action="addnewuser.php" method="POST" class="form login">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<button type="submit" class="btn-btn-primary">Register</button>
  </form>
</body> 
 -->