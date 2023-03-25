<!-- Navbar on pages != index-->
<nav id="navbar" class="navbar navbar-expand-lg fixed-top" >
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo"><img src="res/img/home.png" alt="" class="img-fluid"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu1">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu1">
        <ul class="navbar-nav ms-auto">
          <?php
          if(isLoggedIn() === true) //different navbar when logged in 
          {
            echo "<li class ='nav-item'> <a class='nav-link'> hello ". $_SESSION["useruid"] ." </a> </li>
            <li class='nav-item'>
            <a href='index.php?page=news' class='nav-link'>News</a>
          </li>";
          if (isAdmin() === true){ //different navbar when admin
            echo "<li class='nav-item'>
                  <a href='index.php?page=admin' class='nav-link'>Administration</a>
                </li>
                <li class='nav-item'>
                <a href='index.php?page=adminbook' class='nav-link'>Bookingmanagement</a>
              </li>";
          }
         echo"
         <li class='nav-item'> 
         <a href='index.php?page=booknow' class='nav-link'>Booking</a>
       </li>
          <li class='nav-item'>
            <a href='index.php?page=profile' class='nav-link'>Profile</a>
          </li>
          <li class='nav-item'>
            <a href='index.php?page=logout' class='nav-link'>Logout</a>
          </li>
          ";
          }
          else if(isLoggedIn() === false){ //if not logged in 
            echo " <li class='nav-item'>
            <a href='index.php?page=signup' class='nav-link'>Signup</a>
          </li>
          <li class='nav-item'>
            <a href='index.php?page=login' class='nav-link'>Login</a>
          </li>";
          }
          ?>
        
        </ul>
      </div>
    </div>
  </nav>