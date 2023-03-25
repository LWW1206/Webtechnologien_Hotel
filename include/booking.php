
<section id = "Forms1" class = "text-center">
<div id = "box1" class="container">
<?php
	$id = $_SESSION["userid"];

if (isset($_POST["btnReserve"])) { //if botton is pressed
	$name = trim($conn->real_escape_string($_POST["txtName"])); //real_escape_string to Escape special characters in strings; more secure
	$room = trim($conn->real_escape_string($_POST["txtRoom"]));
	$date = trim($conn->real_escape_string($_POST["txtSDate"]));
	$enddate = trim($conn->real_escape_string($_POST["txtEDate"]));
	$days = days($date, $enddate);
	if($enddate < $date){ //if checkout date is before checkin date
		echo "<div class='alert alert-danger' role='alert'> Cannot enter a checkout Date that is prior to checkin Date </div>";
	}
	else if(!alreadybooked($room, $date, $enddate) == false){ //if date is already booked
		echo "<div class='alert alert-danger' role='alert'> Room is taken for this time period </br> Please choose an different room or a different date </div>";
	}
	else { //give the extras the value of their cost
	if (isset($_POST['extra1'])) {
		$extra1 = 30;
	} 
	if (isset($_POST['extra2'])){
		$extra2 = 20;
	}
	if (isset($_POST['extra3'])){
		$extra3 = 50;
	}
	$roomcost = $days * rooms($room) + $extra1 + $extra2 + $extra3; //calculate total cost 
	$sql = "INSERT INTO reservations (name, room, sdate, edate, extra1, extra2, extra3, cost, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);"; //db
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "smt failed";
	   exit();
   }
	mysqli_stmt_bind_param($stmt, "sssssssss", $name, $room, $date, $enddate, $extra1, $extra2, $extra3, $roomcost, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	echo "<div class='alert alert-success' role='alert'> Room sucessfully booked </br> The total amount is ".$roomcost."€  </br> See on Details on your profile!</div>"; //sucess msg
}
}
?>

<h1> Booking page </h1>
<?php
echo "Today is " . date("Y/m/d") . "<br>";
?>

<div class="row">
            <div class="offset-2 col-8 font-size-xl">
                <form action="" method="post" class="my-5">
                    <div class="form-group">
                        <label for="txtName">Name:</label>
                        <input type="text" class="form-control" name="txtName" required>
                    </div>
					<div class="form-group">
                        <label for="txtRoom">Room Type:</label>
                        <select class="form-control" name="txtRoom" required>
                            <option value="Regular">Regular (150€/night)</option>
                            <option value="Deluxe">Deluxe (300€/night)</option>
                            <option value="VIP Suite">VIP Suite (666€/night)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtstartDate">Checkin-Date:</label>
                        <input type="text" class="form-control datepicker" name="txtSDate" id="txtSDate" required>
                    </div>
					<div class="form-group">
                        <label for="txtEndDate">Checkout-Date:</label>
                        <input type="text" class="form-control datepicker" name="txtEDate" id="txtEDate" required>
                    </div></br>
					<div class="form-group">
                        <label for="txtExtras">Extras:</label></br>
                        </br><input type ="checkbox" name ="extra1" value="30"/> Breakfast(+30€) 
						</div>
						<div class="form-group">
						<input type ="checkbox" name ="extra2" value="20"/> Parking Place(+20€) 
						</div>
						<div class="form-group">
						<input type ="checkbox" name ="extra3" value="50"/> Pets(+50€) 
                    </div>
				</br>
                    <button type="submit" class="btn btn-dark" name="btnReserve">Book Now!</button>
                </form>
            </div>
</div>
</section>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() { //calendar js
            $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
                startDate: 'today',
            });
        });
    </script>

	<?php 
	function days($sdate, $edate){ //calculate number of nights booked
	$earlier = new DateTime("$sdate");
	$later = new DateTime("$edate");
	$abs_diff = $later->diff($earlier)->format("%a"); 
	return $abs_diff;
	}

	function rooms($rooms){ //costs of rooms
		if ($rooms === 'Regular'){
			$roomcost = 150;
		}
		if ($rooms === 'Deluxe'){
			$roomcost = 300;
		}
		if ($rooms === 'VIP Suite'){
			$roomcost = 666;
		}
		return $roomcost;
	}

	function alreadybooked($roomtype, $sdate, $edate) //check if already booked
	{
		include 'config/dbacess.php';
		$sql1 = "SELECT * FROM reservations";
		$reservations = mysqli_query($conn, $sql1);
		if ($reservations) {
			if (mysqli_num_rows($reservations) > 0) {
				while ($row = mysqli_fetch_array($reservations)) {
					if($row['room'] === $roomtype){ //check for all of same room type
						$dbstime = strtotime($row['sdate']); //strtotime — Parse about any English textual datetime description into a Unix timestamp
						$dbetime = strtotime($row['edate']); //makes it into a number 
						$start_time = strtotime($sdate);
						$end_time = strtotime($edate);
						if($dbstime <= $start_time  && $start_time <= $dbetime ){ //checkindate <= any db checkindate AND <= any db checkouttime with same roomtype
							return true;
						}
						else if ($dbstime <= $end_time && $end_time <= $dbetime ){
							return true;
						}
						else {
							return false;
						}
					}
				}
			}
	
		}
	}
	?>