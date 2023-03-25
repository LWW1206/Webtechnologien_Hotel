<section id="profile" class="d-flex align-items-center">
<div id = "box2" class="container">
<?php
$currentUser = $_SESSION['useruid'];
if (isset($_POST['update'])) { //update profile
    $newAnrede = $_POST['updateAnrede']; //get data from form
    $newName = $_POST['updateName'];
    $userNewName = $_POST['updateUserName'];
    $userNewEmail = $_POST['userEmail'];
    $userImage = $_FILES['userImage'];
    if (!empty($userNewName) && !empty($userNewEmail)) { //email and username cannot be empty
            $sql1 = "UPDATE users SET usersAnrede = '$newAnrede', usersName = '$newName', usersUid = '$userNewName', usersEmail ='$userNewEmail' WHERE usersUid = '$currentUser'";
            $results = mysqli_query($conn, $sql1);
        $_SESSION['useruid'] = $userNewName;
        $currentUser = $userNewName; //set currentuser to newusername if changed
         echo "<div class='alert alert-success' role='alert'> Data has been changed </div>" ;
                }
                else {
                    echo "<div class='alert alert-danger' role='alert'> cannot be empty! </div>" ;
                }
            }

$usersql = "SELECT * FROM users WHERE usersUid ='$currentUser'"; //select all users
$gotResuslts = mysqli_query($conn,$usersql);
if (mysqli_num_rows($gotResuslts) > 0) {
    $row = mysqli_fetch_array($gotResuslts);
}

if (isset($_POST['updatePw'])) { //update password
    $oldPw = $_POST['oldPw'];
    $newPw = $_POST['newPw'];
    if ($gotResuslts) {
                $password = $row['usersPwd'];
                $checkPassword = password_verify($oldPw, $password); //check if old password is correct
                if ($checkPassword === false) {
                    echo "<div class='alert alert-danger' role='alert'> Old Password is not correct, please try again! </div>";
                } elseif ($checkPassword === true) { //if correct change password
                    $hashednewPwd = password_hash($newPw, PASSWORD_DEFAULT);
                    $sql1 = "UPDATE users SET usersPwd = '$hashednewPwd' WHERE usersUid = '$currentUser'";
                    $results = mysqli_query($conn, $sql1);
                    echo "<div class='alert alert-success' role='alert'> Password has been changed </div>";
                
            }
        }
    }

    if (isset($_POST['upload'])) { //upload profile picture
        
        //simple upload form that only allows jpeg, jpg or png
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "uploads/userid/" . $filename;
        $file_ext = explode('.',$_FILES["uploadfile"]["name"]);
        $file_ext=strtolower(end($file_ext));
        $extensions= array("jpeg","jpg", "png");
        if(!in_array($file_ext,$extensions)){
            echo "<div class='alert alert-danger' role='alert'> Extension not allowed, please choose a JPEG, JPG or PNG file. </div>";
         }
        else { //insert into database
           $sql2 = "UPDATE users SET filename = '$filename' WHERE usersUid = '$currentUser'";
            mysqli_query($conn, $sql2);
     
        if (move_uploaded_file($tempname, $folder)) { //move to folder for userpfp
            echo "<div class='alert alert-success' role='alert'> Profileimage has been uploaded </div>";
        }  
        
        }
    }
    ?>

   <h1> Profilepage: Welcome back <?php echo $currentUser; ?> !</h1>
   <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">

        <?php 
        if ($row['filename'] === 'notset'){ //if no profile pic is uploaded show default pic = totoro
            echo "<img class='picture' src='res/img/totoro.png'>";
        }
        else { //if there is an pfp pic uploaded show pfp pic 
            echo "<img class='picture' src='uploads/userid/" . $row['filename'] . "'>";
        }
        ?>
               <span class="font-weight-bold"> </span><span class="text-black-50"> <?php echo $row['usersEmail'] ?> </span><span> </span></div>
               <label class="labels"> Change Profileimage </label> 
            <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group"></br>
                <input class="form-control" type="file" name="uploadfile" value=""  required/>
            </div></br>
            <div class="mb-3 text-center form-group">
                <button class="btn btn-outline-primary" type="submit" name="upload">Upload</button>
            </div>

        </form>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex just   ify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
      </div>   
      <form action = "" method = "post">
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
                  <div class="mt-5 text-center form-group">
                    <button class="btn btn-outline-primary profile-button" type="submit" name="update" value="sbumit">Save Profile</button></div>
            </form>
      </br>
      <h4 class="text-right">Change your Password</h4></br>
            <form action = "" method = "post">
            <label class="labels">Old Password</label>
               <div class="form-group">
                  <input type="password" name="oldPw" class="form-control" placeholder = "Enter your old password">
                  </div>
                  <label class="labels">New Password</label>
               <div class="form-group">
                  <input type="password" name="newPw" class="form-control" placeholder = "Enter your new password">
                  </div>
                  <div class="mt-5 text-center form-group">
                    <button class="btn btn-outline-primary profile-button" type="submit" name="updatePw" value="sbumit">Update Password</button></div>
        </div>
    </div>
</div>
</div>
</section>
<section id="profile" class="container">
    <div id = "box1">
        <h1> Your Bookings: </h1>
<?php
//include bookings of the user
include 'reservierung.php';
?>
</div>
</section>
