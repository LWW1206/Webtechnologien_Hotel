<section id = profile>
<div id = "box1" class="container">
<h1>News</h1>
<?php
if (isset($_POST['delete'])){ //if delete Post
  $currPost = $_POST['userId']; //get post id
  $currfile = $_POST['filepath']; //get currentfilepath
  unlink(realpath($currfile)); //delete file in folder thumbnail
  $sql =  "DELETE FROM files WHERE id = '$currPost'";
  $results3 = mysqli_query($conn, $sql);
  echo "<div class='alert alert-success' role='alert'> Post has been deleted </div>" ; //msg
}

$result = $conn->query("SELECT * FROM files ORDER BY uploaded_at DESC"); //select all files in db = posts
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){ //display the posts in cards
    echo "<div class='card text-center'>
    <div class='card-header'> News No".$row['id'] ."</div> <p class='card-text'> </br>";
    echo '<img src="'.$row['file_path'].'" /><br/>';
    echo  $row['textfile'];
    echo " </p> <div class='card-footer text-muted'>Posted on: " . $row['uploaded_at'] . "</div></div></br>";
    //if is admin can delete posts -> form for that
    if(isAdmin() === true){ ?> 
      <form action = "" method = "post"> 
      <div class=' text-center form-group'>
                <input type="hidden" name="filepath"  class="form-control" value="<?php echo $row['file_path']; ?>" >
                <input type="hidden" name="userId"  class="form-control" value="<?php echo $row['id']; ?>" >
                <button class='btn btn-danger profile-button' type='submit' name='delete' value='submit'>delete post</button>
            </div> </br>
    </form>
<?php
    }
  }
}
?>
</div>
</section>

<div id = "box2" class="container">
<?php
if (isAdmin() === true){
   include_once 'include/upload.php';
}
       
      else {
    echo "<h4> Please log in as admin to contribute to our newspage </h4>";
      }
?>
  </div>