<!-- Navbar on index -->
<nav id="navbar" class="navbar navbar-expand-lg fixed-top" >
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo"><img src="res/img/home.png" alt="" class="img-fluid"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu2">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu2">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="#Rooms" class="nav-link">Rooms</a>
          </li>
          <li class="nav-item">
            <a href="#Questions" class="nav-link">Infos</a>
          </li>
          <li class="nav-item">
            <a href="#Contact" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href='index.php?page=news' class="nav-link">News</a>
          </li>
          <?php
          if (isAdmin() === true){
            echo "<li class='nav-item'>
                  <a href='index.php?page=admin' class='nav-link'>Administration</a>
                </li>
                <li class='nav-item'>
                <a href='index.php?page=adminbook' class='nav-link'>Bookingmanagement</a>
              </li>";
          }
          ?>
          <li class="nav-item">
            <a href='index.php?page=profile' class="nav-link">Profile</a>
          </li>
          <li class="nav-item">
            <a href='index.php?page=logout' class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

