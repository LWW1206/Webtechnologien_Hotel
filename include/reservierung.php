<?php
//show bookings of the logged in user
$currentUserid = $_SESSION['userid'];
$usersql1 = "SELECT * FROM reservations WHERE userId = '$currentUserid'";
$gotResuslts = mysqli_query($conn,$usersql1);
if ($gotResuslts) {
    if (mysqli_num_rows($gotResuslts) > 0) { //display all data
        while ($row = mysqli_fetch_array($gotResuslts)) {
            echo "<div id = 'box1' class = 'container'>";
            echo "<h2> Booking ". $row['room']."</br></h2>";
            echo "<b>Name:</b> ".$row['name']."</br>";
            echo "<b>Roomtype: </b> ". $row['room']."</br>";
            echo "<b>Check-in Date: </b>". $row['sdate']."</br>";
            echo "<b>Check-out Date: </b>" . $row['edate']. "</br>";
            echo "<b>Breakfast: </b>";
            if(!$row['extra1'] == NULL){
                echo "yes ";
            }
            else {
                echo "no ";
            }
            echo "</br> <b>Parking Lot: </b>";
                if(!$row['extra2'] == NULL){
                echo "yes ";
            }
            else {
                echo "no ";
            }
            echo "</br> <b>Pets: </b>";
            if(!$row['extra3'] == NULL){
                echo "yes";
            }
            else {
                echo "no ";
            }
            echo "</br><b>Total Cost: </b>" . $row['cost'] . "€</br>";
            echo "<b>Date of Booking: </b>" . $row['date'] . "</br>";
            echo "<b>Status of Booking: </b>" . $row['status'] . "</br>";
            echo "</div>";

        }
    }
}
            ?>
        