<section id="profile" class="d-flex align-items-center">
  <div id = "box1" class="container" style="overflow-x:auto;">
    <h1>Reservations Management</h1>
  <?php
if(isset($_POST['submit'])) { //if submit change status of reservation with right ID
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $id = mysqli_real_escape_string($conn, $_POST['ID']);
    $update_query = "UPDATE reservations SET status='$status' WHERE Id = '$id'";
    $update = mysqli_query($conn, $update_query);
    if($update) {
      echo "<div class='alert alert-success' role='alert'> Status has been changed </div>"; //msg
    } else {
          echo "<div class='alert alert-danger' role='alert'> There was an Error, Try again! </div>"; //msg
    }
  }
  ?>
        <?php
          $sql = "SELECT * FROM reservations ORDER BY sdate DESC";
          $result = mysqli_query($conn, $sql);
        ?>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Room</th>
              <th scope="col">Booking Date</th>
              <th scope="col">Check-In Date</th>
              <th scope="col">Check-Out Date</th>
              <th scope="col">Total Amount</th>
              <th scope="col">Status</th>
              <th scope="col">Update Status</th>
              <th scope="col">Details of Booking</th>
            </tr>
          </thead>
          <tbody>
  <?php while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
    <tr>
      <td><?php echo $data["name"]; ?></td>
      <td><?php echo $data["room"]; ?></td>
      <td><?php echo $data["date"]; ?></td>
      <td><?php echo $data["sdate"]; ?></td>
      <td><?php echo $data["edate"]; ?></td>
      <td><?php echo $data["cost"]; ?> €</td>
      <td><?php echo $data["status"]; ?></td>
      <form method="post">
        <input type="hidden" name="bookingstatus" value="<?php echo $data['status']; ?>">
        <input type="hidden" name="ID" value="<?php echo $data['id']; ?>">
        <td>
          <input type="radio" name="status" value="confirmed"> Confirm
          <br>
          <input type="radio" name="status" value="cancelled"> Cancel
          <br>
          <input type="submit" name="submit" value="OK">
        </td>
        <td>
      </form>
      <details>
  <summary>
    Show Details
  </summary>
  <p> 
      <b>Extras: </b>
      <?php   // show extras that are booked, if booked display yes, if not booked dispaly no
      echo "</br> Breakfast: ";
      if(!$data['extra1'] == NULL){
        echo "yes ";
      }
      else {
        echo "no ";
    }
      echo "</br> Parking Lot: ";
      if(!$data['extra2'] == NULL){
        echo "yes ";
      }
      else {
        echo "no ";
    }
      echo "</br> Pets: ";
      if(!$data['extra3'] == NULL){
        echo "yes";
      }
      else {
        echo "no ";
    }
      
      ?>
  </p>
</details>
<td>
    </tr>
    <?php } ?> 
</table>
</tdbody>
    </div>
  </section>
 