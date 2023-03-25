<?php
// Check for empty input signup
function emptyInputSignup($anrede, $name, $email, $username, $pwd, $pwdRepeat) {
	if (empty($anrede) ||empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}
// Check invalid username
function invalidUid($username) {
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}
// Check invalid email
function invalidEmail($email) {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}
// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if username is in database, if so then return data
function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn); //initionalizing new prepared statement to make it more secure and then tieing the sql statement, to prepvent any injection of code 
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../index.php?page=signup&error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) { //fetch the data as an associative array; if i get some data from the database = true, else = false
		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	//mysqli_stmt_close($stmt);
}


// Insert new user into database
function createUser($conn, $anrede, $name, $email, $username, $pwd) {
  $sql = "INSERT INTO users (usersAnrede, usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../index.php?page=signup&error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssss", $anrede, $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../index.php?page=signup&error=none");
	exit();
}

// Check for empty input login
function emptyInputLogin($username, $pwd) {
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check for account status
function isactive()
{
include "../config/dbacess.php";
$currentUser = $_SESSION['useruid'];
$usersql = "SELECT * FROM users WHERE usersUid ='$currentUser'";
$gotResuslts = mysqli_query($conn, $usersql);
if ($gotResuslts) {
  if (mysqli_num_rows($gotResuslts) > 0) {
	while ($row = mysqli_fetch_array($gotResuslts)) {
	  if ($row['user_status'] === "active"){
		return true;
	  } 
	  else {
		session_unset();
		header("location: ../index.php?page=login&error=deactivated");
		exit();
	  }
	}
}
}
}

//Check for is User is of type admin
function isAdmin()
{
	include 'config/dbacess.php';
$currentUser = $_SESSION['useruid'];
$usersql = "SELECT * FROM users WHERE usersUid ='$currentUser'";
$gotResuslts = mysqli_query($conn, $usersql);
if ($gotResuslts) {
  if (mysqli_num_rows($gotResuslts) > 0) {
	while ($row = mysqli_fetch_array($gotResuslts)) {
	  if ($row['user_type'] === "admin"){
		return true;
	  } 
	  else {
		return false;
	  }
	}
}
}
}
// Log user into website
function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username, $username); //check for username or email

	if ($uidExists === false) {
		header("location: ../index.php?page=login&error=wronglogin");
		exit();
	}
	$pwdHashed = $uidExists["usersPwd"]; //check for user
	$checkPwd = password_verify($pwd, $pwdHashed); //check hashed pw

	if ($checkPwd === false) {
		header("location: ../index.php?page=login&error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		if(isactive() === true){
			header("location: ../index.php");
		}
		else if (isactive() === false){
			header("location: ../index.php?page=login&error=deactivated");
		exit();
		}
		exit();
	}
}

// Check if User is logged in
function isLoggedIn()
{
	if (isset($_SESSION["useruid"])) {
		return true;
	}else{
		return false;
	}
}

