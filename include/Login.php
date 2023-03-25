
<section id  = "Forms" class = "login-form text-center">
    <div id = "box">
    <h2> Login </h2>
    <div>
        <p>Dont have an account yet?<br/>
        Sign up <a href = "index.php?page=signup"> here! </a> </p>
    <form action = "include/login.inc.php" method = "post"> 
        <p><input type = "text" name ="uid" placeholder="Username/Email..." > <br/> 
        <p><input type = "password" name ="pwd" placeholder="Password..." > <br/>
        
        <p><button class="btn btn-secondary btn-block" type = "submit" name ="submit" > Login </button><br/></p>
        forgot your password? </br>
        Please contact our staff
    </form>
</br>
</div>
<?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p class='text-danger'>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "wronglogin") {
        echo "<p class='text-danger'>Wrong login!</p>";
      }
      else if ($_GET["error"] == "deactivated") {
        echo "<p class='text-danger'>Account is deactivated!
        </br> Please contact our Staff for reactivation</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>Sucessfull login!</p>";
      }
    }
  ?>
</div>
</section>

