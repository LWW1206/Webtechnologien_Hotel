<?php
switch($_GET['page']){
    case "signup": 
      include "include/Signup.php";
      include "include/navbarlogin.php";
      break;
    case "login": 
      include "include/Login.php";
      include "include/navbarlogin.php";
      break;
    case "impressum":
      include "include/impressum.php";
      include "include/navbarlogin.php";
      break;
    case "help":
        include "include/help.php";
        include "include/navbarlogin.php";
        break;
    case "booknow":
      include "include/booknow.php";
      include "include/navbarlogin.php";
      break;
    case "news":
      include "include/news.php";
      include "include/navbarlogin.php";
      break;
    case "profile":
      include "include/profile.php";
      include "include/navbarlogin.php";
      break;
  case "admin":
    include "include/admin_control.php";
    include "include/navbarlogin.php";
    break;
  case "adminbook":
    include "include/admin_booking.php";
    include "include/navbarlogin.php";
    break;
  case "update":
    include "include/updateProfile.php";
    include "include/navbarlogin.php";
    break;
  case "logout":
      include "include/logout.php";
      break;
    default:
      include "index.content.php";
    break;
  }
?>