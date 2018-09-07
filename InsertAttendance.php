<?php
	include('config.php');

	$Rno = $_POST['Rno'];

	$CheckAttendSQL = 'SELECT * FROM tbl_t_attendance WHERE Registration_No = '.$Rno.' AND Date_Recorded = CURRENT_DATE';
	$CheckAttend = mysqli_query($euceventMysqli,$CheckAttendSQL) or die (mysqli_error($euceventMysqli));
	if(mysqli_num_rows($CheckAttend) > 0)
	{	
		$output = "You already have a existing record this day.";
		echo $output;
	} 
	else
	{

		$InsertAttendSQL = 'INSERT INTO tbl_t_attendance (Registration_No,Date_Recorded) VALUES ('.$Rno.',CURRENT_DATE)';
		$InsertAttend = mysqli_query($euceventMysqli,$InsertAttendSQL) or die (mysqli_error($euceventMysqli));

		$output = "Successfully Recorded";

		echo $output;
	}


?>