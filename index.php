<?php
include_once 'config/dbacess.php';
include_once 'include/functions.inc.php';
    require 'include/config.php';
    include_once 'include/Header.php';
    if (isLoggedIn() === true){ //include different navbars depending on if they are logged in or not
      include_once 'include/navbaruser.php';
    }
    else {
      include_once 'include/navbarguest.php';
    }
    include_once 'include/navigation.php';
    include_once 'include/Footer.php';

?>

