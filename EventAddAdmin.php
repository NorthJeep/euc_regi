<?php
	include('config.php');
	session_start();

	$ID = $_SESSION['LoggedIn'];
	$Title = $_POST['Title'];
	$Location = $_POST['Location'];
	$Date = $_POST['Date'];
	$CPD = $_POST['CPD'];
	$Time = $_POST['Time'];
	$Organizer = $_POST['Organizer'];
	$Desc = $_POST['Desc'];
	$Price = $_POST['Price'];
	$Phase = $_POST['Phase'];


	
	$AddEventSQL = 'INSERT INTO tbl_t_event (User_ID,
											Event_Title,
											Event_Date,
											Event_Time,
											Event_Location,
											Event_OrganizerDetail,
											Event_Desc,
											Event_CPD,
											Event_Price,
											Event_Phases)
									VALUES  ('.$ID.',
											"'.$Title.'",
											"'.$Date.'",
											"'.$Time.'",
											"'.$Location.'",
											"'.$Organizer.'",
											"'.$Desc.'",
											'.$CPD.',
											'.$Price.',
											'.$Phase.')';
	$AddEvent = mysqli_query($euceventMysqli,$AddEventSQL) or die (mysqli_error($euceventMysqli));
	
	$header = 'Location:/euc_regi/index_Admin.php?id='.$ID.'';
	header($header);
?>