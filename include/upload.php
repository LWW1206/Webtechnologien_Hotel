<section id="profile" class="d-flex align-items-center">
  <div id="box1" class="container">
    <h2>Upload something for our newspage!</h2>
    <br>
    <form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label for="textfile">Text:</label>
        <input type="text" id="textfile" name="textfile" required class="form-control">
      </div>
        <label for="formFileLg">File:</label>
        <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" required></br>      
      <div class="row justify-content-center">
        <div class="col-auto">
          <button class="btn btn-outline-primary btn-lg" type="submit">Upload</button>
        </div>
      </div>
    </form>
    
<?php 
include 'config/dbacess.php';

$uploadDir = "uploads/news/"; //base directory of uploads 
$thumbnailDir = 'uploads/thumbnails/'; // generated thumbnails are uploaded in this directory 

if (!file_exists($uploadDir)) {  // if the upload directory doesn't exist, it has to be created first (it makes a new directory)
    mkdir($uploadDir);
}
if (!file_exists($thumbnailDir)) { // if the thumbnail directory doesn't exist, it has to be created first (it makes a new directory)
    mkdir($thumbnailDir);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) { // if the user has submitted the form with a file 

  $uploadFile = $uploadDir; // creating a new variable 
  $uploadFile .= $_FILES["file"]["name"]; // adding the name of the file to a new directory (e.g. uploads/news/myimage.jpeg)
  $errors = array(); // error array
  $date = date("Y-m-d H:i:s");  // Get the current date and time
  $textfile = $_POST['textfile']; // fetches submitted text, name, size, and filetype
  $file_name = $_FILES["file"]["name"]; 
  $file_size = $_FILES["file"]["size"];
  $file_type = $_FILES["file"]["type"];
  $file_ext = explode('.', $_FILES["file"]["name"]); // looks for each period of each string and splits it, creates an index in an array 
  $file_ext = strtolower(end($file_ext)); // changing the file extension to lower case and using the last index in the array (because it has to match jpeg, jpg, png ((lower case)) )
  
  echo "Text: " . $textfile . "<br>";
  echo "Uploaded at: " . $date . "<br>";
  echo "File name: " . $file_name . "<br>";
  echo "File size: " . $file_size . "<br>";
  echo "File type: " . $file_type . "<br>";

  $extensions = array("jpeg", "jpg", "png"); //array with image types that are accepted 

  //check file extension, if the uploaded image type does not match with a valid file type, error message gets displayed
  if (!in_array($file_ext, $extensions)) { 
    $errors[] = "Extension not allowed, please choose a JPEG,JPG or PNG file.";
  }

  //check file size
  if ($file_size > 22097152) {
    $errors[] = 'File size must be lower 20 MB';
  }

  //check if file already exists
  if (file_exists("uploads/news/" . $file_name)) {
    $errors[] = 'File with that name already exists.';
  }

  if (empty($errors) == true) { // if there are no errors
    echo '<div class="alert alert-success mb-3"> Success! </div>'; // alert success message
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) { // moves temporarily uploaded file from the system into a real directory with the given name
      $ext = strtoupper(pathinfo($uploadFile, PATHINFO_EXTENSION)); // pathinfo breaks the given string into an array, the second argument provides a specific part of that array (like jpeg, png etc); converts it to upper case letters for later comparision
      $filename = pathinfo($uploadFile, PATHINFO_BASENAME); // the same but with the basename (the full file name like news.jpeg)
      $thumbnail = image_resize($uploadFile, 300, 300, true); // calling image resize function, returns an image resource
      $thumbnailpath = 'uploads/thumbnails/' . $filename; // path for the new thumbnail 

      $image = null; // declaring the variable
      switch ($ext) {
        case 'JPEG':
        case 'JPG':
          $image = imagejpeg($thumbnail, $thumbnailpath); // stores image as jpeg 
          break;
        case 'PNG':
          $image = imagepng($thumbnail, $thumbnailpath); // stores image as png 
          break;
      }
      if ($image) {
        // Include the database configuration file
        include 'config/dbacess.php';

        // Get the current user's ID
        $user_id = $_SESSION["userid"];

        // Prepare the insert statement
        $stmt = $conn->prepare("INSERT INTO files (file_path, file_name, uploaded_at, user_id, textfile) VALUES (?, ?, ?, ?, ?)");

        // Bind the parameters
        // Bind the parameters
        $stmt->bind_param("sssss", $thumbnailpath, $file_name, $uploaded_at, $user_id, $textfile);

        // Execute the statement
        $stmt->execute();
        // Close the statement and connection
        $stmt->close();
        mysqli_close($conn);
      }
    }
  } else {
    //loop through the errors and print them
    foreach ($errors as $value) {
      echo '<div class="alert alert-danger mb-3">' . $value . ' </div>';
    }
  }
}
?>
</div>
</section>

<?php
// function to resize the uploaded image
function image_resize($file_name, $width, $height, $crop=FALSE) { // crop argument was originally implemented but not used in the final stage of the code
    $ext=strtoupper(pathinfo($file_name, PATHINFO_EXTENSION)); // converts file extension to upper case letters for later switch-comparison
   list($wid, $ht) = getimagesize($file_name); //  getimagesize creates an array detailing the image dimensions, list creates variables from the response of the array
   $r = $wid / $ht; // calculating the ratio -> width/height
  
    if ($width/$height > $r) { // if the requested dimensions are wider than they are tall
        $new_width = $height*$r; // it sets a new width based on the given height in the correct aspect ratio of the uploaded image
        $new_height = $height; // requested height
    } else {
        $new_height = $width/$r; // if the dimensions are taller than it is wide 
        $new_width = $width; // it sets the width to the correct aspect ratio 
    }
   switch ($ext) { 
    // create image resource based on extension
        case 'JPEG':
        case 'JPG' :
            $source=imagecreatefromjpeg ($file_name); // image will be created from a jpeg 
            break;
        case 'PNG' :
            $source=imagecreatefrompng($file_name); // image will be created from a png 
            break;
    }
   $dst = imagecreatetruecolor($new_width, $new_height); // creating an empty image resource with the new width and height 
   imagecopyresampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht); // creating the resized image based on the original image
   return $dst; // returns the new, resized image resource 
  }
  
  ?>