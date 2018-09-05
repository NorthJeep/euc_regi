<?php
	include('config.php');
	session_start();

	$ID = $_POST['EID'];
	$Title = $_POST['ETitle'];
	$Location = $_POST['ELocation'];
	$Date = $_POST['EDate'];
	$Phase = $_POST['EPhase'];
	$Time = $_POST['ETime'];
	$Organizer = $_POST['EOrganizer'];
	$Desc = $_POST['EDesc'];
	$Price = $_POST['EPrice'];

	$EditEventSQL = 'UPDATE tbl_t_event SET Event_Title = "'.$Title.'",
											Event_Date = "'.$Date.'",
											Event_Time = "'.$Time.'",
											Event_Phases = "'.$Phase.'",
											Event_Location = "'.$Location.'",
											Event_OrganizerDetail = "'.$Organizer.'",
											Event_Desc = "'.$Desc.'",
											Event_Price = '.$Price.'
										WHERE Event_ID = '.$ID.' ';
					
	$EditEvent = mysqli_query($euceventMysqli,$EditEventSQL) or die (mysqli_error($euceventMysqli));
	echo 'OK';
	echo $Price;
	$header = 'Location:/euc_regi/index_Admin.php?id='.$ID.'';
	header($header);
?>
