<section id = profile class = 'container'>
    <h1>All Users</h1>

<?php //if update get data from form and change it in database
if (isset($_POST['update'])) {
    $currUser = $_POST['userId'];
    $newAnrede = $_POST['updateAnrede'];
    $newName = $_POST['updateName'];
    $userNewName = $_POST['updateUserName'];
    $userNewEmail = $_POST['userEmail'];
    $password = $_POST['newuserPassword'];
    $hashednewPwd = password_hash($password, PASSWORD_DEFAULT);
    if (!empty($password)) {
        $sql2 = "UPDATE users SET usersPwd = '$hashednewPwd' WHERE usersId = '$currUser'";
        $results2 = mysqli_query($conn, $sql2);
    }
    if (!empty($userNewName) && !empty($userNewEmail)) {
            $sql1 = "UPDATE users SET usersAnrede = '$newAnrede', usersName = '$newName', usersUid = '$userNewName', usersEmail ='$userNewEmail' WHERE usersId = '$currUser'";
            $results = mysqli_query($conn, $sql1);
        echo "<div class='alert alert-success' role='alert'> Data has been changed </div>" ;
                }
                else {
                    echo "<div class='alert alert-danger' role='alert'> Username or Email cannot be empty </div>" ;
                }
            }

if (isset($_POST['deactivate'])){ //if deactivate is pressed user status is overwritten
    $currUser = $_POST['userId'];
    $deactivate = 'deactivated';
    $sql3 =  "UPDATE users SET user_status = '$deactivate' WHERE usersId = '$currUser'";
    $results3 = mysqli_query($conn, $sql3); 
}

if (isset($_POST['activate'])){ //if activate is pressed user status is overwritten
    $currUser = $_POST['userId'];
    $activate = 'active';
    $sql3 =  "UPDATE users SET user_status = '$activate' WHERE usersId = '$currUser'";
    $results3 = mysqli_query($conn, $sql3); 
}

//grab data from database table users, display it in a form
$usersql = "SELECT * FROM users";
$gotResuslts = mysqli_query($conn,$usersql);
if ($gotResuslts) {
    if (mysqli_num_rows($gotResuslts) > 0) {
        while ($row = mysqli_fetch_array($gotResuslts)) {
            echo "<div id = 'box1' class = 'container'>";
            ?>
            <form action = "" method = "post">
            <div class="mt-5 text-center">
                    <h2>
                    <?php
                    echo $row['usersName'];
                    echo "</h2>";
                    if ($row['filename'] === 'notset'){
                        echo "<img class='picture' src='res/img/totoro.png'>";
                    }
                    else {
                        echo "<img class='picture' src='uploads/userid/" . $row['filename'] . "'>";
                    }
                    ?>
                
        </div> 
                <label class="labels">Anrede</label>
                <div class="form-group">
                    <input type="text" name="updateAnrede" class="form-control" value="<?php echo $row['usersAnrede']; ?>">
                </div>
                <label class="labels">Name</label>
                <div class="form-group">
                    <input type="text" name="updateName" class="form-control" value="<?php echo $row['usersName']; ?>">
                    </div>
                <label class="labels">Username</label>
                <div class="form-group">
                  <input type="text" name="updateUserName" class="form-control" value="<?php echo $row['usersUid']; ?>">
                  </div>
               <label class="labels">Email</label>
               <div class="form-group">
                  <input type="email" name="userEmail" class="form-control" value="<?php echo $row['usersEmail']; ?>">
                  </div>
                <label class="labels">Password</label>
                <div class="form-group">
                  <input type="password" name="newuserPassword" class="form-control" placeholder="new Password">
                  </div>
                  <div class="form-group">
            <input type="hidden" name="userId"  class="form-control" value="<?php echo $row['usersId']; ?>" >
            </div>
            <br>
            <?php echo 'User Profile Status: ';
            echo $row['user_status']; ?>
            <div class=" text-center form-group">
                <button class="btn btn-outline-danger profile-button" type="submit" name="deactivate" value="submit">deactivate profile</button>
                <button class="btn btn-outline-success profile-button" type="submit" name="activate" value="submit">activate profile</button>
            </div>
            <div class="mt-4 text-center form-group">
                    <button class="btn btn-primary profile-button" type="submit" name="update" value="submit">update profile</button></div>
            
            </form>
            <?php
            echo "</div>";
        }
    }
}
?>
</section>