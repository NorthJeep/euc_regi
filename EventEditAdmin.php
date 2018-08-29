<?php
	include('config.php');
	session_start();

	$ID = $_SESSION['ELoggedIn'];
	$Title = $_POST['ETitle'];
	$Location = $_POST['ELocation'];
	$Date = $_POST['EDate'];
	$Time = $_POST['ETime'];
	$Organizer = $_POST['EOrganizer'];
	$Desc = $_POST['EDesc'];

	
?>
