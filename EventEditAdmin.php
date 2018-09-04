<?php
	include('config.php');
	session_start();

	$ID = $_POST['EID'];
	$Title = $_POST['ETitle'];
	$Location = $_POST['ELocation'];
	$Date = $_POST['EDate'];
	$Time = $_POST['ETime'];
	$Organizer = $_POST['EOrganizer'];
	$Desc = $_POST['EDesc'];

	$EditEventSQL = 'UPDATE tbl_t_event SET Event_Title = "'.$Title.'",
											Event_Date = "'.$Date.'",
											Event_Time = "'.$Time.'",
											Event_Location = "'.$Location.'",
											Event_OrganizerDetail = "'.$Organizer.'",
											Event_Desc = "'.$Desc.'"
										WHERE Event_ID = '.$ID.' ';
										
	$EditEvent = mysqli_query($euceventMysqli,$EditEventSQL) or die (mysqli_error($euceventMysqli));
	echo 'OK';
	$header = 'Location:/euc_regi/index_Admin.php?id='.$ID.'';
	header($header);
?>
