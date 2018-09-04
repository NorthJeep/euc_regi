<?php
	include('config.php');
	session_start();

	$ID = $_SESSION['LoggedIn'];
	$Title = $_POST['Title'];
	$Location = $_POST['Location'];
	$Date = $_POST['Date'];
	$Time = $_POST['Time'];
	$Organizer = $_POST['Organizer'];
	$Desc = $_POST['Desc'];

	
	$AddEventSQL = 'INSERT INTO tbl_t_event (User_ID,
											Event_Title,
											Event_Date,
											Event_Time,
											Event_Location,
											Event_OrganizerDetail,
											Event_Desc)
									VALUES  ('.$ID.',
											"'.$Title.'",
											"'.$Date.'",
											"'.$Time.'",
											"'.$Location.'",
											"'.$Organizer.'",
											"'.$Desc.'")';
	$AddEvent = mysqli_query($euceventMysqli,$AddEventSQL) or die (mysqli_error($euceventMysqli));
	echo 'OK';
	$header = 'Location:/euc_regi/index_Admin.php?id='.$ID.'';
	header($header);
?>