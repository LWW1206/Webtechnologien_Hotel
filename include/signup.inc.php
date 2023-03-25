<?php

if (isset($_POST["submit"])) {

  $anrede = $_POST["anrede"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];

  //error handlers
  // These functions can be found in functions.inc.php
  include '../config/dbacess.php';
  include 'functions.inc.php';

  // check for empty input
  if (emptyInputSignup($anrede, $name, $email, $username, $pwd, $pwdRepeat) !== false) {
    header("location: ../index.php?page=signup&error=emptyinput");
		exit();
  }
	// Proper username chosen
  if (invalidUid($uid) !== false) {
    header("location: ../index.php?page=signup&error=invaliduid");
		exit();
  }
  // Proper email chosen
  if (invalidEmail($email) !== false) {
    header("location: ../index.php?page=signup&error=invalidemail");
		exit();
  }
  // Do the two passwords match?
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../index.php?page=signup&error=passwordsdontmatch");
		exit();
  }
  // Is the username taken already, check for username and email
  if (uidExists($conn, $username, $email) !== false) {
    header("location: ../index.php?page=signup&error=usernametaken");
		exit();
  }

  // insert the user into the database
  createUser($conn, $anrede, $name, $email, $username, $pwd);

} else {
	header("location: ../index.php?page=signup");
    exit();
}
