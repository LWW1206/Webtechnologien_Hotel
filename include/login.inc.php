<?php

if (isset($_POST["submit"])) {

  // get data from form
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  //error handlers 
  // These functions can be found in functions.inc.php
  require_once '../config/dbacess.php';
  require_once 'functions.inc.php';

  //inputs empty
  if (emptyInputLogin($username, $pwd) === true) {
    header("location: ../index.php?page=login&error=emptyinput");
		exit();
  }

  // If we get to here, it means there are no user errors
  // Now we insert the user into the database
  loginUser($conn, $username, $pwd);

} else {
	header("location: ../index.php?page=login");
    exit();
}
