<?php
if (!isLoggedIn()) { //if not logged in dont show booking page
	echo "
	<section id = 'Forms1' class = 'text-center'>
	<h2>  You must log in first to make a booking! </br><a href ='index.php?page=login' class ='btn btn-link btn-lg'> Click here to log in! </a> </h2>
	</section>
	";
}
else if(isLoggedIn() === true){
	include_once 'booking.php';
	}
?>
