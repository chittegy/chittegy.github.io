<?php 
	$mysqli = new mysqli('localhost','chittegy','Pa$$w0rd','waph');
	if($mysqli->connect_errno){
		printf("database connection failed: %s\n", $mysqli->connect_error);
		exit();
	}
	function changePassword($username, $newpassword){
		global $mysqli;
		// $hashedpassword= md5($newpassword);
		$stmt = $mysqli -> prepare("Update users SET password =md5(?) WHERE username= ?" );
		$stmt->bind_param("ss", $newpassword, $username);
		if($stmt->execute()){
			return true;
		}else{
			error_log('password update failed: ' . $stmt->error);
		return false;
	}
}

function editProfile($username, $newemail, $newusername){
		global $mysqli;
		// $hashedpassword= md5($newpassword);
		$stmt = $mysqli -> prepare("Update users SET email = ?, username = ? WHERE username= ?" );
		$stmt->bind_param("sss", $newemail, $newusername, $username);
		if($stmt->execute()){
			return true;
		}else{
			error_log('Profile edit failed: ' . $stmt->error);
		return false;
	}
}

function registerUser($username, $email, $password){
	global $mysqli;
    // $hashedpassword= md5($password);
	  $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, md5(?))");
    $stmt->bind_param("sss", $username, $email, $password);
    if($stmt->execute()) {
    	return TRUE;
    }else{
    	error_log('user registration failed: ' . $stmt->error);
    	return false;
    }
}


function loginUser($username, $password) {

	global $mysqli;

	$prepared_sql = "SELECT * FROM users where username= ? AND password = md5(?);";
	$stmt = $mysqli->prepare($prepared_sql);

	$stmt->bind_param("ss",$username,$password);
	$stmt->execute();

  $result = $stmt -> get_result();

  if($result -> num_rows == 1){

    return TRUE;
  }
	else{
		printf("Loggin failed!");
		return FALSE;	
		exit();
	}
}


function fetchUserDetails($username) {
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT username, email FROM users WHERE username=?;");
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	return $row;
}



?>
