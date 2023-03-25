<section id  = "Forms" class = "signup-form text-center">
    <div id = "box" class = "center">
    <h2> Sign Up </h2>
    <p><span>* required fields</span></p>
    <div id>
    <form action="include/signup.inc.php" method="post"> 
        <input type = "text" name ="anrede" placeholder="Anrede..."><br/>
        <span>* </span>
        <br>
        <input type = "text" name ="name" placeholder="Full name..."><br/>
        <span>* </span>
        <br>
        <input type = "text" name ="email" placeholder="Email..."><br/>
        <span >* </span>
        <br>
        <input type = "text" name ="uid" placeholder="Username..." ><br/>
        <span >* </span>
        <br>
        <input type = "password" name ="pwd" placeholder="Password..."><br/>
        <span >* </span>
        <br>
        <input type = "password" name ="pwdrepeat" placeholder="Repeat password..."><br/>
        <span >* </span>
        <br>
        <button class="btn btn-secondary" type = "submit" name ="submit" value = "submit"> Sign up </button><br/>
    </form>
</div>
</br>
<?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p class='text-danger'>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invaliduid") {
        echo "<p class='text-danger'>Choose a proper username!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p class='text-danger'>Choose a proper email!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p class='text-danger'>Passwords doesn't match!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p class='text-danger'>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p class='text-danger'>Username or Email already in Use</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p class='text-success'>You have signed up!</p>";
      }
    }
  ?>
</div>
</section>
